<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\AuthorList;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    /**
     * Function to create author
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function createAuthor()
    {
        return view('admin.author.create');
    }

    /**
     * Function to register new user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registerAuthor(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:admin_users,admin_email',
            'password'   => 'required|string|min:6|confirmed',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:250', // 250KB max
            'role'       => 'required|in:admin,author,manager,editor',  // enforce valid role
            'status'     => 'required|in:A,D', // enforce status
        ]);

        $adminController = new \App\Http\Controllers\Admin\AdminController();

        // Upload image if present
        $imageUrl = "";
        if ($request->hasFile('image')) {
            $profilePic = $request->file('image');
            $imageUrl = $adminController->uploadImage($profilePic, 'Author', 0, 's3', '');
        }

        $cleanDescription = $adminController->cleanContent($request->description);

        // Log for debugging
        Log::info('Role received: ' . $request->role);
        Log::info('Status received: ' . $request->status);

        // Create AdminUser with valid role and active status
        $adminUser = AdminUser::create([
            'admin_name'        => $request->name,
            'admin_email'       => $request->email,
            'admin_password'    => Hash::make($request->password),
            'admin_role'        => $request->role, // role validated
            'admin_is_active'   => $request->status === 'A' ? 1 : 0, // active if 'A'
            'can_create_author' => in_array($request->role, ['admin', 'manager']) ? $request->can_create_author : 0,
        ]);

        // Create AuthorList linked to AdminUser
        AuthorList::create([
            'admin_id'              => $adminUser->admin_id,
            'title'                 => $request->name,
            'company'               => $request->company,
            'designation'           => $request->designation,
            'text'                  => $cleanDescription,
            'emailid'               => $request->email,
            'slug'                  => Str::slug($request->name),
            'image'                 => $imageUrl,
            'news_upload_capability' => $request->upload_capability == 1 ? 1 : 0,
            'phone_no'              => $request->phone_no,
            'address'               => $request->address,
            'linkedin_profile'      => $request->linkedin_profile,
            'facebook_profile'      => $request->facebook_profile,
            'twitter_profile'       => $request->twitter_profile,
            'insta_profile'         => $request->insta_profile,
            'status'                => $request->status,
        ]);

        return redirect()->route('list.author')->with('success', 'Author (User) profile created.');
    }



    public function editAuthor(Request $request)
    {
        $authorId = $request->id;
        $author    = AuthorList::query()->where('author_id', $authorId)->first();
        return view('admin.author.create', ['author' => $author]);
    }

    /**
     * Function to listing authors
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function listAuthor()
    {
        $authors = AuthorList::query()->with('admin')->orderBy('author_id', 'DESC')->paginate(10);
        // dd($authors);
        return view('admin.author.list', compact('authors'));
    }

    /**
     * Function to view author for edit
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function viewAuthor(Request $request)
    {
        $authorId = $request->id;
        $author    = AuthorList::query()->where('author_id', $authorId)->first();
        return view('admin.author.create', ['author' => $author]);
    }

    /**
     * Function to update author
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAuthor(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:250',
        ]);

        // Fetch Author and linked AdminUser
        $author = AuthorList::with('admin')->findOrFail($request->author_id);
        $adminUser = $author->admin;

        // CASE 1: If author->admin_id is empty but same email exists in admin_users
        if (empty($author->admin_id)) {
            $existingAdmin = AdminUser::where('admin_email', $request->email)->first();
            if ($existingAdmin) {
                $adminUser = $existingAdmin;
                $author->admin_id = $existingAdmin->admin_id;
            }
        }

        // CASE 2: If still no linked admin, create a new one
        if (!$adminUser) {
            $adminUser = new AdminUser();
        }

        // Handle Image
        $adminController = new \App\Http\Controllers\Admin\AdminController();
        $imageUrl = $request->old_image;
        $imageUrl = Str::of($imageUrl)->after('https://franchiseindia.s3.ap-south-1.amazonaws.com');
        if ($request->hasFile('image')) {
            $imageUrl = $adminController->uploadImage(
                $request->file('image'),
                'Author',
                1,
                's3',
                $request->old_image
            );
        }

        // Clean description
        $cleanDescription = $adminController->cleanContent($request->description);

        // Update AdminUser
        $adminUser->admin_name        = $request->name;
        $adminUser->admin_email       = $request->email;
        if (!empty($request->password)) {
            $adminUser->admin_password = Hash::make($request->password);
        }
        $adminUser->admin_role        = $request->role !== 'author' ? $request->role : 'author';
        $adminUser->admin_is_active   = $request->status == 'A' ? 1 : 0;
        $adminUser->can_create_author = in_array($request->role, ['admin', 'manager']) ? $request->can_create_author : 0;
        $adminUser->save();

        // Link author with admin
        $author->admin_id               = $adminUser->admin_id;
        $author->title                  = $request->name;
        $author->company                = $request->company;
        $author->designation            = $request->designation;
        $author->address                = $request->address;
        $author->phone_no               = $request->phone_no;
        $author->linkedin_profile       = $request->linkedin_profile;
        $author->facebook_profile       = $request->facebook_profile;
        $author->twitter_profile        = $request->twitter_profile;
        $author->insta_profile          = $request->insta_profile;
        $author->text                   = $cleanDescription;
        $author->emailid                = $request->email;
        $author->slug                   = Str::slug($request->name);
        $author->image                  = $imageUrl;
        $author->news_upload_capability = $request->upload_capability == 1 ? 1 : 0;
        $author->status                 = $request->status;
        $author->save();
        if ($request->profile == 1) {

            return redirect()->route('admin.Dashboard')->with('success', 'Your Profile Updated.');
        }
        return redirect()->route('list.author')->with('success', 'Author (User) profile updated.');
    }




    /**
     * Function to update author status with ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAuthorStatus(Request $request)
    {
        try {
            $validated = $request->validate([
                'authorId'     => 'required|exists:author_list,author_id',
                'authorstatus' => 'required|in:A,D', // A = Active, D = Deactivated
            ]);

            $author = AuthorList::find($validated['authorId']);
            $author->status = $validated['authorstatus'];
            $author->admin->admin_is_active = $validated['authorstatus'] === 'A' ? 1 : 0;
            $author->admin->save();
            $author->save();

            // Map status codes to human-readable strings
            $statusText = $author->status === 'A' ? 'Active' : 'Inactive';

            return response()->json([
                'success' => true,
                'status'  => $author->status,    // still return code if needed
                'statusText' => $statusText,     // human-readable status
                'message' => 'Author status updated successfully.'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error'   => true,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    /**
     * Function to delete author
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAuthor(Request $request)
    {
        // dd($request->all());
        $authorId = $request->authorId;
        $author = AuthorList::find($authorId);

        if ($author) {
            // Delete associated AdminUser
            $adminUser = $author->admin;
            // dd($adminUser);
            if ($adminUser) {
                $adminUser->delete();
            }
            // Delete AuthorList entry
            $author->delete();
            return redirect()->route('list.author')->with('success', 'Author (User) profile deleted successfully.');
        } else {
            return redirect()->route('list.author')->with('error', 'Author not found.');
        }
    }

    /**
     * Function to retrieve author list with ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function publisher(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = AuthorList::query()
                ->select("title", "author_id")
                ->where('title', 'LIKE', "%{$search}%")
                ->where('status', 'A')
                ->get();
        }
        return response()->json($data);
    }


    /**
     * Author Profile to see the author
     */

    public function authorProfile($id)
    {
        $authorId = $id;
        $author    = AuthorList::query()->where('author_id', $authorId)->first();
        return view('admin.author.profile', ['author' => $author]);
    }
}
