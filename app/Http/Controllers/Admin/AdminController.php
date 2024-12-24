<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContentTagsAssignedHindi;
use App\Models\HindiContentRef;
use App\Models\HindiNewsRef;
use App\Models\SeoTag;
use App\Models\NewsList;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use App\Models\InsightCategory;
use App\Models\InsightsHindiCategory;
use App\Models\InsightSubcategory;
use App\Models\InsightsHindiSubCategory;
use App\Models\AdminUser;
use App\Models\AuthorList;
use App\Models\NewsComment;
use App\Models\SeoTagHindi;
use App\Models\ContentList;
use App\Models\MagazineList;
use App\Models\ContentComment;
use App\Models\MagazineComment;
use App\Models\MagazineCategory;
use App\Models\ContentSliderImage;
use App\Models\ContentTagsAssigned;
use App\Mail\CommentReplyMail;
use App\Models\FranchisorBusinessDetail;
use App\Models\ArticleInterviewCommentReply;
use App\Models\FihlPodcastVideo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\FihlVideoCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('ContentAdmin')->except('loginView', 'loginCheck', 'relatedBrands');
    }

    /**
     *View the dashboard Page
     */
    public function viewDashboard()
    {
        return view('admin/admin-dashboard');
    }

    /**
     *View the login Page
     */
    public function loginView()
    {
        return view('admin/admin-login');
    }

    /**
     *logout
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->forget('admin_name');
        $request->session()->forget('adminEmail');
        $request->session()->forget('role');
        return redirect('admin/login');
    }

    /**
     *  login view function
     *  name & password are coming from form data
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginCheck(Request $request)
    {
        $email      = $request->email;
        $password   = $request->password;
        $admUser    = AdminUser::query()->where(['admin_email' => $email])->first();

        if ($admUser == null)
            return redirect('admin/login');

        //checking if hash exists in the entered password
        if (Hash::getFacadeRoot()->check($password, $admUser->admin_password)) {
            session()->flush();
            $adm_name = $admUser->admin_name;
            $request->session()->put('admin_name', $adm_name);
            $request->session()->put('adminEmail', $email);
            $request->session()->put('role', $admUser->admin_dept);
            $request->session()->put('author_creation_capability', $admUser->can_create_author);
            return redirect('admin/dashboard');
        }

        return redirect('admin/login');
    }

    /**
     * Function to create author
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function createAuthor()
    {
        return view('admin/author/author-form');
    }

    /**
     * Function to register new user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registerAuthor(Request $request)
    {
        $imageUrl       = "";
        $name           = $request->name;
        $email          = $request->email;
        $company        = $request->company;
        $desc           = $request->desc;
        $slug           = Str::slug($request->name);
        $designation    = $request->designation;

        if ($request->hasFile('image')) {
            $profilePic = $request->file('image');
            $imageUrl = $this->uploadImage($profilePic, 'Author', 0, 's3', '');
        }

        AuthorList::query()->insert([
            'title'                  => $name,
            'company'                => $company,
            'designation'            => $designation,
            'text'                   => $this->cleanContent($desc),
            'emailid'                => $email,
            'slug'                   => $slug,
            'image'                  => $imageUrl,
            'news_upload_capability' => ((request()->news_upload_capability == 1) ? 1 : 0),
            'phone_no'               => request()->phone_no,
            'address'                => request()->address,
            'linkedin_profile'       => request()->linkedin_profile,
            'facebook_profile'       => request()->facebook_profile,
            'twitter_profile'        => request()->twitter_profile
        ]);
        return redirect("admin/list-author");
    }

    /**
     * Function to listing authors
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function listAuthor()
    {
        $record = AuthorList::query()->select('author_id', 'title', 'status')->orderBy('author_id', 'DESC')->get();
        return view('admin/author/list-author', ['author' => $record]);
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
        return view('admin/author/author-form', ['author' => $author]);
    }

    /**
     * Function to update author
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAuthor(Request $request)
    {
        $imageUrl       = ($request->hasFile('image')) ? $this->uploadImage($request->file('image'), 'Author', 1, 's3', $request->old_image) : $request->old_image;

        if ($request->hasFile('image'))
            AuthorList::query()->where('author_id', $request->id)->update(['image' => $imageUrl]);

        AuthorList::query()->where('author_id', $request->id)
            ->update([
                'title'                  => $request->name,
                'company'                => $request->company,
                'designation'            => $request->designation,
                'text'                   => $this->cleanContent($request->desc),
                'emailid'                => $request->email,
                'slug'                   => Str::slug($request->name),
                'news_upload_capability' => ((request()->news_upload_capability == 1) ? 1 : 0),
                'phone_no'               => request()->phone_no,
                'address'                => request()->address,
                'linkedin_profile'       => request()->linkedin_profile,
                'facebook_profile'       => request()->facebook_profile,
                'twitter_profile'        => request()->twitter_profile
            ]);
        return redirect("admin/list-author");
    }

    /**
     * Function to update author status with ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAuthorStatus(Request $request)
    {
        $authorId = $request->authorId;
        $status   = $request->authorstatus;
        AuthorList::query()->where('author_id', $authorId)->update(['status' => $status]);
        return response()->json(array('ratings' => $status), 200);
    }

    /**
     * Function to show the create article view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function createArticleView()
    {
        $kickerData    = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
        $kicker        = array_column($kickerData, 'name');
        $relatedBrands = FranchisorBusinessDetail::query()->select('franchisor_id', 'company_name')->get();
        return view('admin/article/create-article-interview', compact('kicker', 'relatedBrands'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getCreateHindiArticleNewsForm()
    {
        $contentId      = request()->contentId;
        $contentType    = (request()->type == 'article') ? 1 : 2;
        $class          = ($contentType == 1) ? ContentList::query() : NewsList::query();
        $id             = ($contentType == 1 ? "content" : "news") . '_id';
        $content        = $class->where($id, $contentId)->first();
        $classHindi     = ($contentType == 2) ? HindiNewsRef::query() : HindiContentRef::query();

        if (empty($content))
            return redirect()->back();

        $hindiContent   = $classHindi->where($id, $contentId)->first();
        $associatedTags = ContentTagsAssignedHindi::query()->select('tag_id')->where('content_type', $contentType)->where('content_id', $contentId)->get();
        $associatedTags = SeoTagHindi::query()->whereIn('tag_id', $associatedTags->pluck('tag_id'))->get();
        $kicker         = (!empty($hindiContent) > 0) ? SeoTagHindi::query()->where('tag_id', $hindiContent->kicker)->first() : "";
        $authors        = AuthorList::query()->select('author_id', 'title')->where('news_upload_capability', 1)->where('status', "A")->get();

        return view('admin.hindi-content.create-hindi-article-interview', compact('kicker', 'relatedBrands', 'contentId', 'hindiContent', 'associatedTags', 'contentType', 'content', 'authors'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUpdateHindiArticle(Request $request)
    {
        $contentType = ($request->content_type == 2) ? 'news' : 'content';
        $classHindi  = ($request->content_type == 2) ? HindiNewsRef::query() : HindiContentRef::query();
        $id          = $contentType . '_id';
        $contentId   = request()->$id;

        $classHindi->updateOrCreate(
            [$id          => $contentId],
            [
                'kicker'     => $request->kicker,
                'title'      => $request->title,
                'home_title' => $request->home_title,
                'short_desc' => $request->pharagraph,
                'author'     => $request->content_publisher,
                'content'    => $this->cleanContent($request->desc),
                'updated_by' => session()->get('adminEmail'),
            ]
        );

        //Updating Status of hindi article
        $class          = ($request->content_type == 1) ? ContentList::query() : NewsList::query();
        $class->where($id, $contentId)->update(['is_hindi' => $request->status]);

        ContentTagsAssignedHindi::query()->where('content_type', $request->content_type)->where('content_id', $contentId)->delete();

        foreach ($request->associated_tags as $tagId)
            ContentTagsAssignedHindi::query()->insert(['content_type' => $request->content_type, 'tag_id' => $tagId, 'content_id' => $contentId]);

        $checkKickerAssociatoin = ContentTagsAssignedHindi::query()->where('content_type', $request->content_type)->where('content_id', $contentId)->where('tag_id', $request->kicker)->first();

        if (empty($checkKickerAssociatoin))
            ContentTagsAssignedHindi::query()->insert(['tag_id' => $request->kicker, 'content_id' => $contentId, 'content_type' => $request->content_type]);

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getKickersList()
    {
        //Url validation
        if (request()->type != 'hindi' &&  request()->type != 'english')
            return redirect()->back();

        $class   = (request()->type == 'hindi') ? (SeoTagHindi::query()->orderByDesc('tag_id')) : (SeoTag::query()->orderByDesc('tag_id'));

        //If it is caling as search
        if (!empty(request()->search))
            $class   = $class->where('name', 'LIKE', '%' . request()->search . '%');

        $kickers = $class->paginate(20);
        $type    = request()->type;

        return view('admin.kickers.list-kickers', compact('kickers', 'type'));
    }

    /**
     * @return mixed
     */
    public function deleteKicker()
    {
        $class   = (request()->type == 'hindi') ? (SeoTagHindi::query()) : (SeoTag::query());
        return $class->where('tag_id', request()->tag_id)->delete();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreateKickerView()
    {
        if (request()->type == 'hindi')
            $kickerData = SeoTagHindi::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
        elseif (request()->type == 'english')
            $kickerData = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
        else
            return redirect()->back();

        $type    = request()->type;
        $kickers = array_column($kickerData, 'name');
        return view('admin.kickers.create-kicker', compact('kickers', 'type'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function insertUpdateKicker()
    {
        $class = SeoTag::query();
        if (request()->type == 'hindi')
            $class = SeoTagHindi::query();
        $kickerCount   = $class->where('name', request()->kicker)->select('name')->count();

        if ($kickerCount == 0) {
            $class->insert(['name' => request()->kicker]);
        } else {
            session()->flash('failed', 'Kicker already Exists');
            return redirect()->back();
        }

        return redirect('/admin/kickers/list/' . request()->type);
    }

    /**
     * Function to retrieve tags using ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHindiKickers(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $class  = request()->type == 1 ? SeoTag::query() : SeoTagHindi::query();
            $data   = $class->select("tag_id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }

    /**
     * Function to create new article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createArticle(Request $request)
    {
        // dd($request->all());
        $imageUrl          = "";
        $role              = $request->role;
        $subSubCat         = !empty($request->sub_sub_cat) ? $this->stringyfyText($request->sub_sub_cat) : ""; //sub sub to a single variable
        $brand             = !empty($request->brands) ? $this->stringyfyText($request->brands) : "";           //brands to a single variable
        $subCat            = !empty($request->sub_cat) ? $this->stringyfyText($request->sub_cat) : "";         //sub cat to a single variable

        //upload file if exists
        if ($request->hasFile('image')) {

            //Uploading article main Image
            $articleImage  = $request->file('image');
            $imageUrl = $this->uploadImage($articleImage, $request->content_type, 0, 's3', '');

            //thumbnail creation for article
            $this->thumbnailCreation($imageUrl, $request->content_type, 247, 139);
        }


        $contentId = ContentList::query()->insertGetId([
            'contentType'                 => $request->content_type,
            'title'                       => $request->title,
            'kicker'                      => $request->kicker,
            'content'                     => $request->desc,
            //            'content'                     => $this->cleanContent($request->desc),
            'is_intl'                     => (($request->is_intl == 1) ? 1 : 0),
            'is_noindexnofollow'          => (($request->is_noindexnofollow == 1) ? '1' : '0'),
            'author'                      => $request->content_publisher,
            'image'                       => $imageUrl,
            'slug'                        => Str::slug($request->title),
            'company'                     => $request->company,
            'site_type'                   => $role,
            'homeTitle'                   => $request->home_title,
            'shortDesc'                   => $request->pharagraph,
            'interviewee'                 => $request->interviewee,
            'related_brand'               => $brand,
            'related_category_id'         => $request->main_cat,
            'related_sub_category_id'     => $subCat,
            'related_sub_sub_category_id' => $subSubCat

        ]);


        if ($role == 'ga') {

            for ($i = 1; $i <= 15; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $desc          = 'desc' . $i;
                    $galleryImage  = $request->file('image' . $i);
                    $sliderUrl     = $this->uploadImage($galleryImage, 'Gallery', 0, 's3', '');

                    ContentSliderImage::query()->insert([
                        'content_id' => $contentId,
                        'content'    => $request->$desc,
                        'image'      => $sliderUrl
                    ]);
                }
            }
            $thumbnailImage = ContentSliderImage::query()->where('content_id', $contentId)->select('image')->first()->image;
            ContentList::query()->where('content_id', $contentId)->update(['image' => $thumbnailImage]);

            //thumbnail for gallery article
            $this->thumbnailCreation($thumbnailImage, 'Gallery', 247, 139);
        }

        //kicker inserting or updating to seo tag table
        if (!empty($request->kicker))
            $this->insertKickers($request->kicker, $contentId, 1);

        //increasing frequency of uploaded tags
        if (!empty($request->associated_tags))
            $this->insertAssociatedTags($request->associated_tags, $contentId, 1, 0, '');

        return redirect("admin/list-article-interview")->with('success', 'Data Saved Successfully.');
    }

    /**
     * Function to show article and interview listing
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function listArticleInterview(Request $request)
    {
        $role                 = $request->session()->get('role');
        $articleInterviewData = ContentList::query()->where('site_type', $role)
            ->Where('title', 'LIKE', '%' . $request->search . '%')

            ->orWhere('content_id', $request->search)
            ->orderBy('content_id', 'DESC')->paginate(40);

        return view('admin/article/list-article-interview', compact('articleInterviewData'));
    }

    /**
     * Function to show edit view of article / interview
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function editViewArticleInterview(Request $request)
    {
        $articleInterviewId = $request->id;
        $data               = ContentList::query()->where('content_id', $articleInterviewId)->first();
        $kickerData         = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
        $kicker             = array_column($kickerData, 'name');
        $relatedBrands      = FranchisorBusinessDetail::query()->select('franchisor_id', 'company_name')->get();
        $brands             = explode(",", $data->related_brand);

        //exploding brand values to a array
        foreach ($brands as $value) {
            $company[]      = FranchisorBusinessDetail::query()->where('franchisor_id', $value)->select('franchisor_id', 'company_name')->first();
        }
        // dd($company);

        $associatedTags     = ContentTagsAssigned::query()->where('content_id', $articleInterviewId)->where('content_type', 1)->select('tag_id')->get();

        //exploding associated tags to a array
        if (count($associatedTags) > 0) {
            foreach ($associatedTags as $tags) {
                $assocTags[]    = SeoTag::query()->where('tag_id', $tags->tag_id)->select('tag_id', 'name')->first();
            }
        }

        $subCat             = explode(",", $data->related_sub_category_id);
        $subSubCat          = explode(",", $data->related_sub_sub_category_id);
        $sliderData         = ContentSliderImage::query()->where('content_id', $request->id)->get();

        return view('admin/article/edit-article-interview', compact('kicker', 'relatedBrands', 'company', 'assocTags', 'subCat', 'subSubCat', 'sliderData'), ['data' => $data]);
    }

    /**
     * Function to edit article or interview
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editArticleInterview(Request $request)
    {
        $role              = $request->role;
        $subSubCat         = !empty($request->sub_sub_cat) ? $this->stringyfyText($request->sub_sub_cat) : ""; //sub sub to a single variable
        $brand             = !empty($request->brands) ? $this->stringyfyText($request->brands) : ""; //brands to a single variable
        $subCat            = !empty($request->sub_cat) ? $this->stringyfyText($request->sub_cat) : "";  //sub cat to a single variable
        $imageUrl          = $request->old_image;

        //deleting previous image file
        if ($request->hasFile('image')) {

            //Uploading article main Image
            $articleImage  = $request->file('image');
            $imageUrl = $this->uploadImage($articleImage, $request->content_type, 1, 's3', $request->old_image);

            //thumbnail creation for article
            $this->thumbnailCreation($imageUrl, $request->content_type, 247, 139);
        }


        //slider images
        if ($role == 'ga') {
            for ($i = 1; $i <= 15; $i++) {

                $descSlider = "desc" . $i;
                $image      = "image" . $i;
                $delete     = "delete" . $i;
                $delete     = $request->$delete;

                if ($request->hasFile($image)) {
                    $isDelete = 0;
                    if (!empty($delete))
                        $isDelete = 1;

                    $galleryImage  = $request->file('image' . $i);
                    $sliderUrl     = $this->uploadImage($galleryImage, 'Gallery', $isDelete, 's3', $delete);

                    if (!empty($delete))
                        ContentSliderImage::query()->where('image', $delete)->update(['content' => $request->$descSlider, 'image' => $sliderUrl]);
                    else
                        ContentSliderImage::query()->insert(['content_id' => $request->artical_interview_id, 'content' => $request->$descSlider, 'image' => $sliderUrl]);
                }
                ContentSliderImage::query()->where('image', $delete)->update(['content'    => $request->$descSlider]);
            }

            $imageUrl = ContentSliderImage::query()->where('content_id', $request->artical_interview_id)->select('image')->first()->image;

            //Gallery Image Thumbnail creation
            $this->thumbnailCreation($imageUrl, 'Gallery', 247, 139);
        }
        if (!empty($request->slug)) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->title);
        }

        $update = [
            'contentType'                 => $request->content_type,
            'title'                       => $request->title,
            'kicker'                      => $request->kicker,
            'content'                     => $request->desc,
            //            'content'                     => $this->cleanContent($request->desc),
            'is_intl'                     => (($request->is_intl == 1) ? 1 : 0),
            'is_noindexnofollow'          => (($request->is_noindexnofollow == 1) ? '1' : '0'),

            'author'                      => $request->content_publisher,
            'slug'                        => $slug,
            'company'                     => $request->company,
            'site_type'                   => $role,
            'homeTitle'                   => $request->home_title,
            'shortDesc'                   => $request->pharagraph,
            'interviewee'                 => $request->interviewee,
            'related_brand'               => $brand,
            'related_category_id'         => $request->main_cat,
            'related_sub_category_id'     => $subCat,
            'updated_by'                  => $request->session()->get('adminEmail'),
            'related_sub_sub_category_id' => $subSubCat

        ];

        if ($request->hasFile('image') ||  $role == 'ga')
            $update['image'] = $imageUrl;

        ContentList::query()->where('content_id', $request->artical_interview_id)->update($update);

        //kicker inserting to database or increasing kicker frequency
        if (!empty($request->kicker))
            $this->insertKickers($request->kicker, $request->artical_interview_id, 1);

        //deleting and reinserting tags
        if (!empty($request->associated_tags))
            $this->insertAssociatedTags($request->associated_tags, $request->artical_interview_id, 1, 1, '');

        // return redirect();
        return redirect("admin/list-article-interview")->with('success', 'Data Updated Successfully.');
    }

    /**
     * Function to update article or interview status
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateArticalInterviewStatus(Request $request)
    {
        $contentId = $request->contentId;
        $status    = $request->contentStatus;
        ContentList::query()->where('content_id', $contentId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * Function to delete article with ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteArticle(Request $request)
    {
        $contentId    = $request->contentId;
        $Content      = ContentList::query()->where('content_id', $contentId)->delete();
        return response()->json(array('Content' => $Content), 200);
    }

    /**
     * Function to get related brands from business details table
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function relatedBrands(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = FranchisorBusinessDetail::query()->select("franchisor_id", "company_name")
                ->where('company_name', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    /**
     * Function to retrieve tags using ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function associatedTags(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;

            if ($request->segment(1) == 'en') {
                $data = SeoTag::query()->select("tag_id", "name")
                    ->where('name', 'LIKE', "%$search%")
                    ->get();
            } else {
                $data = SeoTagHindi::query()->select("tag_id", "name")
                    ->where('name', 'LIKE', "%$search%")
                    ->get();
            }
        }
        return response()->json($data);
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
                ->select("title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }

    /**
     * Function to create news view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function createNewsView()
    {
        $kickerData = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
        $kicker     = array_column($kickerData, 'name');
        $authors    = AuthorList::query()->select('author_id', 'title')->where('news_upload_capability', 1)->where('status', "A")->get();
        return view('admin/news/create-news', compact('kicker', 'authors'));
    }

    /**
     * Function to create news
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createNews(Request $request)
    {
        $imageUrl          = "";
        $role              = $request->session()->get('role');
        $brand             = !empty($request->brands) ? $this->stringyfyText($request->brands) : ""; //get brands and appending to a single variable
        $title             = $request->title;
        $kicker            = $request->kicker;
        $homeTitle         = $request->home_title;
        $subTitle          = $request->sub_title;
        $slug              = Str::slug($title);
        $desc              = $request->input('content');
        $isInternational   = ($request->is_intl == 1) ? 1 : 0;

        if ($request->hasFile('image')) {

            //Uploading Image
            $newsImage = $request->file('image');
            $imageUrl  = $this->uploadImage($newsImage, 'News', 0, 's3', '');

            //thumbnail creation
            $this->thumbnailCreation($imageUrl, 'News', 247, 139);
        }

        //inserting into newslist table
        $newsData                = new NewsList;
        $newsData->title         = $title;
        $newsData->kicker        = $kicker;
        $newsData->news_type     = $role;
        $newsData->homeTitle     = $homeTitle;
        $newsData->shortDesc     = $subTitle;
        $newsData->content       = $desc;
        //        $newsData->content       = $this->cleanContent($desc);
        $newsData->related_brand = $brand;
        $newsData->image         = $imageUrl;
        $newsData->slug          = $slug;
        $newsData->is_intl       = $isInternational;
        $newsData->author_id     = request()->news_publisher;


        if ($newsData->save()) {
            $newsId = $newsData->news_id;
        } else {
            return redirect('admin/list-news');
        }

        //increasing frequency count of kicker or inserting new kicker
        if (!empty($request->kicker))
            $this->insertKickers($request->kicker, $newsId, 2);

        //increasing frequency count of kickers
        if (!empty($request->associated_tags))
            $this->insertAssociatedTags($request->associated_tags, $newsId, 2, 0, '');

        return redirect('admin/list-news');
    }

    /**
     * Function to list news
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function listNews(Request $request)
    {
        $data = NewsList::query()->where('news_type', $request->session()->get('role'))
            ->Where('title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('news_id', $request->search)
            ->orderBy('news_id', 'DESC')
            ->paginate(25);
        return view('admin/news/list-edit-news', compact('data'));
    }

    /**
     * Function to update news view
     * @param Request $request
     * @return bool
     */
    public function editNewsView(Request $request)
    {
        $newsId             = $request->id;
        $kickerData         = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
        $kicker             = array_column($kickerData, 'name');
        $data               = NewsList::query()->where('news_id', $newsId)->first();
        $brands             = explode(",", $data->related_brand);
        $authors            = AuthorList::query()->select('author_id', 'title')->where('news_upload_capability', 1)->where('status', "A")->get();

        //getting brand names to a array
        foreach ($brands as $value) {
            $company[]        = FranchisorBusinessDetail::query()->where('franchisor_id', $value)->select('franchisor_id', 'company_name')->first();
        }
        $associatedTags     = ContentTagsAssigned::query()->where('content_id', $newsId)->where('content_type', 2)->select('tag_id')->get();

        //fetching associated tags to a array
        if (count($associatedTags) > 0) {
            foreach ($associatedTags as $tags) {
                $assocTags[]    = SeoTag::query()->where('tag_id', $tags->tag_id)->select('tag_id', 'name')->first();
            }
        }
        return view('admin/news/edit-news', compact('kicker', 'data', 'assocTags', 'company', 'authors'));
    }

    /**
     * Function to update news view
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateNews(Request $request)
    {
        $role              = $request->session()->get('role');
        $brand             = !empty($request->brands) ? $this->stringyfyText($request->brands) : "";
        $title             = $request->title;
        if (!empty($request->slug)) {
            $slug              = Str::slug($request->slug);
        } else {
            $slug              = Str::slug($title);
        }
        $kicker            = $request->kicker;
        $homeTitle         = $request->home_title;
        $subTitle          = $request->sub_title;
        $desc              = $request->input('content');
        $imageUrl          = $request->old_image;
        $isInternational   = ($request->is_intl == 1) ? 1 : 0;

        //inserting files
        if ($request->hasFile('image')) {

            //Uploading Image
            $newsImage = $request->file('image');
            $imageUrl  = $this->uploadImage($newsImage, 'News', 1, 's3', $request->old_image);

            //thumbnail creation
            $this->thumbnailCreation($imageUrl, 'News', 247, 139);
        }


        $update = [
            'title'         => $title,
            'kicker'        => $kicker,
            'news_type'     => $role,
            'homeTitle'     => $homeTitle,
            'shortDesc'     => $subTitle,
            'content'       => $desc,
            //            'content'       => $this->cleanContent($desc),
            'related_brand' => $brand,
            'slug'          => $slug,
            'is_intl'       => $isInternational,
            'updated_by'    => $request->session()->get('adminEmail'),
            'author_id'     => request()->news_publisher
        ];

        if ($request->hasFile('image'))
            $update['image'] = $imageUrl;

        NewsList::query()->where('news_id', $request->news_id)->update($update);

        //increasing frequency count of kickers
        if (!empty($request->kicker))
            $this->insertKickers($request->kicker, $request->news_id, 2);

        //increasing frequency count of kickers & inserting associative tags
        if (!empty($request->associated_tags))
            $this->insertAssociatedTags($request->associated_tags, $request->news_id, 2, 1, '');

        return redirect('admin/list-news')->with('success', "News Updated Successfully.");
    }

    /**
     * Function to update news status
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateNewsStatus(Request $request)
    {
        $newsId    = $request->News;
        $status    = $request->contentStatus;
        NewsList::query()->where('news_id', $newsId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * Function to ajax delete news
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNews(Request $request)
    {
        $contentId    = $request->contentId;
        $request->contentStatus;
        $Content      = NewsList::query()->where('news_id', $contentId)->delete();
        return response()->json(array('Content' => $Content), 200);
    }

    /**
     * Function to list news comments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listNewsComments()
    {
        $data   = NewsComment::query()->orderBy('commentID', 'DESC')->paginate(30);
        $titles = NewsList::query()->select('title', 'news_id')->whereIn('news_id', $data->pluck('newsID'))->get();
        return view('admin/comments/news/list-news-comment', compact('data', 'titles'));
    }

    /**
     * Function to ajax change status of news comment
     * @param Request $request
     * @return bool
     */
    public function updateNewsCommentStatus(Request $request)
    {
        $NewsCommentId = $request->NewsCommentId;
        $status        = $request->contentStatus;
        NewsComment::query()->where('commentID', $NewsCommentId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * Function to edit news comments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function editNewsComment()
    {
        $data = NewsComment::query()->where('commentID', request()->id)->first();
        return view('admin.comments.edit-comment', compact('data'));
    }

    /**
     * Function to edit news comments
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateNewsComment(Request $request)
    {
        NewsComment::query()->where('commentID', $request->id)
            ->update([
                'mobile'          => $request->mobile,
                'rating'          => $request->rating,
                'comment_user'    => $request->comment_user,
                'comment_email'   => $request->email,
                'comment_content' => $request->input('content')
            ]);

        return redirect('admin/list-news-comments');
    }

    /**
     * Function to search article interview comment
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function searchNewsComment(Request $request)
    {
        $output  = "";
        $results = NewsComment::query()->Where('newsID', $request->search)->get();
        $titles  = NewsList::query()->select('title', 'news_id')->whereIn('news_id', $results->pluck('newsID'))->get();

        if (count($results) == 0)
            return response($output);

        foreach ($results as $result) {

            $titleView = "";

            foreach ($titles as $title) {
                if ($title->news_id == $result->newsID) {
                    $titleView = $title->title;
                }
            }

            $output .= '<tr class="gradeX">' .
                '<td>' . $result->commentID . '</td>' .
                '<td>' . $result->newsID . '</td>' .
                '<td>' . $result->comment_user . '</td>' .
                '<td>' . $result->comment_email . '</td>' .
                '<td>' . $result->mobile . '</td>' .
                '<td>' . $titleView . '</td>' .
                '<td>' . $result->contentType . '</td>' .
                '<td>' . $result->comment_content . '</td>' .
                '<td>' . $result->comment_date . '</td>' .
                '<td style="text-align: center;">
                              <label class="switch">
                                <input type="checkbox" value="' . $result->commentID . '" class="activestate" ' . ($result->status == "Y" ? "checked" : "") . '>
                                <span class="slider round" ></span>
                              </label>
                            </td>' .
                '<td style="text-align: center;"><button class="btn btn-medium btn-warning" style="border-radius: 4px"><a href="edit-news-comment/' . $result->commentID . '">Edit</a></button></td>' .
                '</tr>';
        }
        return response($output);
    }

    /**
     * Function to show magazine create view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @internal param Request $request
     */
    public function createMagazineView()
    {
        return view('admin/magazine/create-magazine');
    }

    /**
     * Function to create magazine
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createMagazine(Request $request)
    {
        $title          = $request->title;
        $month          = $request->month;
        $year           = $request->year;
        $slug           = Str::slug($request->title);
        $imageUrl       = "";

        //upload image file to server
        if ($request->hasFile('image')) {
            $magImage = $request->file('image');
            $imageUrl  = $this->uploadImage($magImage, 'Magazine', 0, 's3', '');
        }

        MagazineCategory::query()->insert(['title' => $title, 'iss_month' => $month, 'iss_year' => $year, 'image' => $imageUrl, 'slug' => $slug, 'status' => 0]);
        return redirect('admin/list-magazine');
    }

    /**
     * Function to list magazines
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function listMagazine()
    {
        $magazineData = MagazineCategory::query()->select('category_id', 'title', 'status')->orderBy('category_id', 'DESC')->paginate(30);
        return view('admin/magazine/list-magazine', compact('magazineData'));
    }

    /**
     * Function to edit magazine views
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function editMagazineView(Request $request)
    {
        $magazineId    = $request->id;
        $magazineData  = MagazineCategory::query()->where('category_id', $magazineId)->first();
        return view('admin/magazine/edit-magazine', compact('magazineData'));
    }

    /**
     * Function to update magazine
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateMagazine(Request $request)
    {
        $categoryId     = $request->magazine_id;
        $title          = $request->title;
        $month          = $request->month;
        $year           = $request->year;
        $slug           = Str::slug($request->title);

        //delete old image and upload new image
        if ($request->hasFile('image')) {
            $magImage = $request->file('image');
            $imageUrl  = $this->uploadImage($magImage, 'Magazine', 1, 's3', $request->old_image);
            MagazineCategory::query()->where('category_id', $categoryId)->update(['image' => $imageUrl]);
        }

        MagazineCategory::query()->where('category_id', $categoryId)->update(['title' => $title, 'iss_month' => $month, 'iss_year' => $year, 'slug' => $slug]);
        return redirect('admin/list-magazine');
    }

    /**
     * Function to list Magazines-articles
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function listMagazineArticles(Request $request)
    {
        $caregoryId = $request->id;
        $articleData = MagazineList::query()->where('category_id', $caregoryId)->select('category_id', 'item_id', 'title', 'views', 'status')->orderBy('category_id', 'DESC')->paginate(30);
        $magazine   = MagazineCategory::query()->where('category_id', $caregoryId)->select('title')->first();
        return view('admin/magazine/magazine-article-list', compact('articleData', 'caregoryId', 'magazine'));
    }

    /**
     * Function to create magazine article views
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function createMagazineArticleView(Request $request)
    {
        $caregoryId = $request->id;
        return view('admin/magazine/create-magazine-article', compact('caregoryId'));
    }

    /**
     * Function to create article for magazine
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createMagazineArticle(Request $request)
    {
        $imageUrl          = "";
        $caregoryId        = $request->category_id;
        $title             = $request->article_title;
        $author            = $request->author;
        $summery           = $request->summery;
        $pharagraph        = $request->pharagraph;
        $content           = $this->cleanContent($request->desc);
        $slug              = Str::slug($request->article_title);

        //inserting new image
        if ($request->hasFile('image')) {
            $magImage = $request->file('image');
            $imageUrl  = $this->uploadImage($magImage, 'Magazine', 0, 's3', '');
        }

        MagazineList::query()->insert(['category_id' => $caregoryId, 'title' => $title, 'author' => $author, 'subtitle' => $summery, 'subparagraph' => $pharagraph, 'content' => $content, 'image' => $imageUrl, 'slug' => $slug]);
        $articleId         = MagazineList::query()->orderBy('item_id', 'desc')->select('item_id')->first();

        //updating the frequency of tags used in articles
        if (!empty($request->tags))
            $this->insertAssociatedTags($request->tags, $articleId->item_id, 3, 0, '');

        return redirect('admin/list-magazine-articles/' . $caregoryId);
    }

    /**
     * Function to update article status of magazines
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateMagazineStatus(Request $request)
    {
        $magazineId    = $request->magazine;
        $status        = $request->contentStatus;
        MagazineCategory::query()->where('category_id', $magazineId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * Function to ajax delete magazine
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMagazine(Request $request)
    {
        $magazineId    = $request->magazineId;
        $delete        = MagazineCategory::query()->where('category_id', $magazineId)->delete();
        return response()->json(array('delete' => $delete), 200);
    }

    /**
     * Function to ajax change status of magazine status
     * @param Request $request
     * @return bool
     */
    public function updateMagazineArticleStatus(Request $request)
    {
        $articleId = $request->articleId;
        $status    = $request->contentStatus;
        MagazineList::query()->where('item_id', $articleId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * Function to ajax delete magazine articles
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMagazineArticle(Request $request)
    {
        $articleId = $request->articleId;
        $delete    = MagazineList::query()->where('item_id', $articleId)->delete();
        return response()->json(array('delete' => $delete), 200);
    }

    /**
     * Function to edit magazine articles
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function editMagazineArticleView(Request $request)
    {
        $articleId       = $request->id;
        $data            = MagazineList::query()->where('item_id', $articleId)->first();

        //get the respective associated tags of article from tag table
        $associatedTags  = ContentTagsAssigned::query()->where('content_id', $articleId)->where('content_type', 3)->select('tag_id')->get();
        if (count($associatedTags) > 0) {
            foreach ($associatedTags as $tags) {
                $assocTags[] = SeoTag::query()->where('tag_id', $tags->tag_id)->select('tag_id', 'name')->first();
            }
        }
        return view('admin/magazine/edit-magazine-article', compact('data', 'assocTags'));
    }

    /**
     * Function to update magazine articles
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateMagazineArticle(Request $request)
    {
        $caregoryId        = $request->category_id;
        $title             = $request->article_title;
        $author            = $request->author;
        $summery           = $request->summery;
        $pharagraph        = $request->pharagraph;
        $content           = $this->cleanContent($request->desc);
        $slug              = Str::slug($request->article_title);

        //deleting previous image and inserting new image
        if ($request->hasFile('image')) {
            $magImage = $request->file('image');
            $imageUrl  = $this->uploadImage($magImage, 'Magazine', 1, 's3', $request->old_image);
            MagazineList::query()->where('item_id', $request->item_id)->update(['image' => $imageUrl]);
        }

        //Updating Magazine List table row for particular magazine article
        MagazineList::query()->where('item_id', $request->item_id)->update(['category_id' => $caregoryId, 'title' => $title, 'author' => $author, 'subtitle' => $summery, 'subparagraph' => $pharagraph, 'content' => $content, 'slug' => $slug]);

        //tags frequency updating
        if (!empty($request->tags))
            $this->insertAssociatedTags($request->tags, $request->item_id, 3, 1, '');

        return redirect('admin/list-magazine-articles/' . $caregoryId);
    }

    /**
     * Function to list article / interview comments
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listArticleInterviewComments(Request $request)
    {
        $data   = ContentComment::query()->where('site_type', $request->session()->get('role'))
            ->orderBy('commentID', 'DESC')
            ->paginate(30);
        $titles = ContentList::query()->select('title', 'content_id', 'homeTitle')->whereIn('content_id', $data->pluck('articleID'))->get();
        return view('admin/comments/article-interview/list-article-interview-comment', compact('data', 'titles'));
    }

    /**
     * Function to ajax change status of article comment
     * @param Request $request
     * @return bool
     */
    public function updateAICommentStatus(Request $request)
    {
        $commentId = $request->commentId;
        $status    = $request->contentStatus;
        ContentComment::query()->where('commentID', $commentId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * Function to list news comments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editArticleInterviewComment()
    {
        $data = ContentComment::query()->where('commentID', request()->id)->first();
        return view('admin.comments.edit-comment', compact('data'));
    }

    /**
     * Function to edit article interview comments
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateArticleInterviewComment(Request $request)
    {
        ContentComment::query()->where('commentID', $request->id)
            ->update([
                'mobile'          => $request->mobile,
                'rating'          => $request->rating,
                'comment_user'    => $request->comment_user,
                'comment_email'   => $request->email,
                'comment_content' => $request->input('content')
            ]);
        return redirect('admin/list-article-interview-comments');
    }

    /**
     * Function to search article interview
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function searchMagazine(Request $request)
    {
        $output = "";
        $results = MagazineCategory::query()->where('title', 'LIKE', '%' . $request->search . '%')->paginate(25);

        if ($results == null)
            return response($output);

        foreach ($results as $key => $result) {
            $output .=  '<tr class="gradeX">' .
                '<td>' . $result->category_id . '</td>' .
                '<td><a href="list-magazine-articles/' . $result->category_id . '">' . $result->title . '</a></td>' .
                '<td style="text-align: center;">
                                  <label class="switch">
                                    <input type="checkbox" value="' . $result->category_id . '" class="activestate" ' . ($result->status == 1 ? "checked" : "") . '>
                                    <span class="slider round" ></span>
                                  </label>
                                </td>' .
                '<td style="text-align: center;"><button class="btn btn-medium btn-warning" style="border-radius: 4px"><a href="edit-magazine-view/' . $result->category_id . '">Edit</a></button></td>' .
                '<td style="text-align: center;"><button class="btn btn-medium btn-danger deleteauthor" style="border-radius: 4px" data-value="' . $result->category_id . '">Delete</button></td>' .
                '</tr>';
        }
        return response($output);
    }

    /**
     * Function to search article interview
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function searchArticleInterviewComment(Request $request)
    {
        $output  = "";
        $results = ContentComment::query()->where('site_type', $request->session()->get('role'))
            ->Where('articleID', request()->search)
            ->get();

        $titles  = ContentList::query()->select('title', 'content_id', 'homeTitle')->whereIn('content_id', $results->pluck('articleID'))->get();

        if (count($results) == 0)
            return response($output);

        foreach ($results as $result) {

            $titleView = "";

            foreach ($titles as $title) {
                if ($title->content_id == $result->articleID) {
                    $titleView = $title->title;
                }
            }

            $output .= '<tr class="gradeX">' .
                '<td>' . $result->commentID . '</td>' .
                '<td>' . $result->articleID . '</td>' .
                '<td>' . $result->comment_user . '</td>' .
                '<td>' . $result->comment_email . '</td>' .
                '<td>' . $result->mobile . '</td>' .
                '<td>' . $titleView . '</td>' .
                '<td>' . $result->comment_content . '</td>' .
                '<td>' . $result->comment_date . '</td>' .
                '<td style="text-align: center;">
                              <label class="switch">
                                <input type="checkbox" value="' . $result->commentID . '" class="activestate" ' . ($result->status == "Y" ? "checked" : "") . '>
                                <span class="slider round" ></span>
                              </label>
                            </td>' .
                '<td style="text-align: center;"><button class="btn btn-medium btn-warning" style="border-radius: 4px"><a href="edit-article-interview-comment/' . $result->commentID . '">Edit</a></button></td>' .
                '<td style="text-align: center;"><a href="article-interview-comment-reply/' . $result->commentID . '"><button class="btn btn-medium btn-success" style="border-radius: 4px">Reply</button></a></td>
                   </tr>';
        }
        return response($output);
    }

    /**
     * Function to delete slider image
     * @param Request $request
     */
    public function deleteArticleSliderImage(Request $request)
    {
        ContentSliderImage::query()->where('slider_id', $request->sliderId)->delete();
        return;
    }

    /**
     * Function to get comment reply
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleCommentReply()
    {
        $commId = request()->id;
        $data   = ArticleInterviewCommentReply::query()->where('comment_id', $commId)->first();
        if (!empty($data))
            return view('admin.comments.replies.comment-reply', compact('commId', 'data'));

        return view('admin.comments.replies.comment-reply', compact('commId'));
    }

    /**
     * Function to create article interview reply
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createArticleCommentReply(Request $request)
    {
        ArticleInterviewCommentReply::query()->insert([
            'comment_id' => $request->id,
            'reply'      => $request->reply
        ]);

        $commentDetail = ContentComment::query()->select('comment_user', 'comment_email', 'site_type', 'articleID')->where('commentID', $request->id)->first();
        $article       = ContentList::query()->select('slug', 'title')->where('content_id', $commentDetail->articleID)->first();
        $url           = Config('constants.MainDomain') . '/' . Config('constants.articleArr.' . $commentDetail->site_type) . '/' . $article->slug . '.' . $commentDetail->articleID;
        $name          = $commentDetail->comment_user;
        $artName       = $article->title;
        $data          = [$name, $url, $artName];

        Mail::to($commentDetail->comment_email)->send(new CommentReplyMail($data));

        return redirect('admin/list-article-interview-comments');
    }

    /**
     * Function to update article interview reply
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateArticleCommentReply(Request $request)
    {
        ArticleInterviewCommentReply::query()->where('reply_id', $request->replyId)->update(['reply' => $request->reply]);
        return redirect('admin/list-article-interview-comments');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getMagazineComments()
    {
        $comments = MagazineComment::query()->orderBy('commentID', 'DESC')->paginate(10);
        $titles   = MagazineList::query()->select('item_id', 'title')->whereIn('item_id', $comments->pluck('magzID'))->get();
        return view('admin.comments.magazine.comment-listing', compact('comments', 'titles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function searchMagazineComment(Request $request)
    {
        $output  = "";
        $results = MagazineComment::query()->orderBy('commentID', 'DESC')->Where('magzID', $request->search)->get();
        $titles  = MagazineList::query()->select('item_id', 'title')->whereIn('item_id', $results->pluck('magzID'))->get();

        if (count($results) == 0)
            return response($output);

        foreach ($results as $result) {
            $titleView = "";

            foreach ($titles as $title) {
                if ($title->article_id == $result->item_id) {
                    $titleView = $title->title;
                }
            }

            $output .= '<tr class="gradeX">' .
                '<td>' . $result->commentID . '</td>' .
                '<td>' . $result->magzID . '</td>' .
                '<td>' . $result->comment_user . '</td>' .
                '<td>' . $result->comment_email . '</td>' .
                '<td>' . $result->mobile . '</td>' .
                '<td>' . $titleView . '</td>' .
                '<td>' . $result->comment_content . '</td>' .
                '<td>' . $result->comment_date . '</td>' .
                '<td style="text-align: center;">
                                  <label class="switch">
                                    <input type="checkbox" value="' . $result->commentID . '" class="activestate" ' . ($result->status == "Y" ? "checked" : "") . '>
                                    <span class="slider round" ></span>
                                  </label>
                                </td>' .
                '<td style="text-align: center;"><button class="btn btn-medium btn-warning" style="border-radius: 4px"><a href="' . Config('constants.MainDomain') . '/edit-mag-comment/' . $result->commentID . '">Edit</a></button></td>' .
                '</tr>';
        }
        return response($output);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setMagazineCommentStatus(Request $request)
    {
        $commentId = $request->commentId;
        $status    = $request->contentStatus;
        MagazineComment::query()->where('commentID', $commentId)->update(['status' => $status]);
        return response()->json(array('status' => $status), 200);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMagazineComment()
    {
        $data = MagazineComment::query()->where('commentID', request()->id)->first();
        return view('admin.comments.edit-comment', compact('data'));
    }

    /**
     * Function to edit news comments
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateMagazineComment(Request $request)
    {
        MagazineComment::query()->where('commentID', $request->id)
            ->update([
                'mobile'          => $request->mobile,
                'rating'          => $request->rating,
                'comment_user'    => $request->comment_user,
                'comment_email'   => $request->email,
                'comment_content' => $request->input('content')
            ]);
        return redirect('admin/magazine-comment-list');
    }

    /**
     * @param $message
     */
    private function setLog($message)
    {
        Log::getFacadeRoot()->error($message);
    }

    /**
     * @param $image
     * @param $type
     * @param $isDelete
     * @param $store_type
     * @param $oldImagePath
     * @return mixed
     */

    private function uploadImage($image, $type, $isDelete, $store_type, $oldImagePath)
    {
        $uploadPath = "uploads/";

        // Delete old image if needed
        if ($isDelete == 1 && $store_type == 'public' && !empty($oldImagePath)) {
            unlink(public_path($oldImagePath));
        }

        if ($isDelete == 1 && $store_type == 's3') {
            Storage::getFacadeRoot()->disk('s3')->delete(parse_url($oldImagePath)['path']);
        }

        // Define the upload path based on the type
        $extension = 'webp'; // Saving images in webp format
        $picPath = config('constants.AdminArticleInterview') . '/' . session()->get('role') . '/art/' . uniqid() . '.' . $extension;

        switch ($type) {
            case 'Author':
                $picPath = $uploadPath . sprintf(config('constants.AdminAuthor'), date('md')) . '/' . uniqid() . '.' . $extension;
                break;
            case 'Article':
                $picPath = $uploadPath . config('constants.AdminArticleInterview') . '/' . session()->get('role') . '/art/' . uniqid() . '.' . $extension;
                break;
            case 'Interview':
                $picPath = $uploadPath . config('constants.AdminArticleInterview') . '/' . session()->get('role') . '/int/' . uniqid() . '.' . $extension;
                break;
            case 'Gallery':
                $picPath = config('constants.AdminArticleInterview') . '/gallery/art/' . uniqid() . '.' . $extension;
                break;
            case 'Magazine':
                $picPath = $uploadPath . config('constants.AdminMagazine') . '/' . '' . uniqid() . '.' . $extension;
                break;
            case 'News':
                $picPath = $uploadPath . config('constants.AdminNews') . '/' . session()->get('role') . '/' . uniqid() . '.' . $extension;
                break;
        }

        // Resize the image to 680x435px and convert it to WebP format
        $resizedImage = Image::make($image)->resize(1600, 940)->encode('webp', 90);
        // dd($resizedImage);
        // Store the image in the specified storage
        Storage::getFacadeRoot()->disk($store_type)->put($picPath, (string) $resizedImage, 'public');
        $imageUrl = Storage::getFacadeRoot()->disk($store_type)->url($picPath);

        // Return the correct image URL
        if ($store_type == 's3' && $type != 'Gallery') {
            return str_replace('storage', 'uploads', parse_url($imageUrl, PHP_URL_PATH));
        }

        return str_replace('storage', 'uploads', $imageUrl);
    }


    /**
     * @param $imageUrl
     * @param $type
     * @param $height
     * @param $width
     */
    private function thumbnailCreation($imageUrl, $type, $width, $height)
    {
        //thumbnail creation
        // dd($imageUrl, $type, $width, $height);
        $sourcePhoto     = public_path($imageUrl);
        $locale = App::getLocale();
        // dd($locale);
        if ($type == 'Gallery') {
            $sourcePhoto = $imageUrl;
        } else if ($type == 'News' && $locale == 'en') {
            $sourcePhoto = Config('constants.franAwsS3Url') . $imageUrl;
            // dd($sourcePhoto);
        } else if ($type == 'News' && $locale == 'hi') {
            $sourcePhoto = Config('constants.awsS3Url') . $imageUrl;
        }

        if ($type != 'Gallery')
            $sourcePhoto = Config('constants.awsS3Url') . $imageUrl;
        $imageName       = pathinfo($sourcePhoto)['basename'];
        // dd($imageName);

        $destinationPath = "uploads";

        switch ($type) {
            case 'Article':
                $destinationPath = public_path('uploads/thumbnails/' . session()->get('role') . '/art/');
                break;

            case 'Interview':
                $destinationPath = public_path('uploads/thumbnails/' . session()->get('role') . '/int/');
                break;

            case 'Gallery':
                $destinationPath = public_path('uploads/thumbnails/ga');
                break;

            case 'News':
                $destinationPath = public_path('uploads/thumbnails/news/' . session()->get('role') . '/');
                // dd($destinationPath);
        }

        try {
            // dd($destinationPath);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image = Image::make($sourcePhoto)->resize($width, $height)->save($destinationPath . '/' . $imageName, 90);
            // dd($image);

        } catch (\Exception $e) {
            $this->setLog('Thumbnail creation error ' . $e->getMessage());
            die;
        }
    }

    /**
     * @param $desc
     * @return null|string|string[]
     */
    private function cleanContent($desc)
    {
        return preg_replace('/style=\\"[^\\"]*\\"/', '', $desc);
    }

    /**
     * @param $array
     * @return string
     */
    private function stringyfyText($array)
    {
        $text = "";
        foreach ($array as $element)
            $text .= $element . ',';

        return rtrim($text, ',');
    }

    /**
     * @param $kicker
     * @param $artId
     * @param $contentType
     */
    private function insertKickers($kicker, $artId, $contentType)
    {
        $kickerCount   = SeoTag::query()->where('name', $kicker)->select('name')->count();


        if ($kickerCount != 0) {
            SeoTag::query()->where('name', $kicker)->increment('frequency'); //increasing frequency count
            $seoId = SeoTag::query()->select('tag_id')->where('name', $kicker)->first()->tag_id;
        } else {
            $seoId = SeoTag::query()->insertGetId(['name' => $kicker, 'frequency' => 1]);
        }

        $check = ContentTagsAssigned::query()->where('content_type', $contentType)
            ->where('content_id', $artId)
            ->where('tag_id', $seoId)
            ->count();

        if ($check == 0)
            ContentTagsAssigned::query()->insert(['content_type' => 1, 'content_id' => $artId, 'tag_id' => $seoId]);
    }

    /**
     * @param $tags
     * @param $id
     * @param $type
     * @param $isDelete
     */
    private function insertAssociatedTags($tags, $id, $type, $isDelete, $isHindi)
    {
        //deleting and reinserting tags
        if ($isHindi == 'en') {
            if ($isDelete == 1)
                ContentTagsAssigned::query()->where('content_id', $id)->where('content_type', $type)->delete();

            foreach ($tags as $associatedTagsNew) {
                ContentTagsAssigned::query()->insert(['content_type' => $type, 'content_id' => $id, 'tag_id' => $associatedTagsNew]);

                //increasing frequency count
                SeoTag::query()->where('tag_id', $associatedTagsNew)->increment('frequency');
            }
        } elseif ($isHindi == 'hi') {
            if ($isDelete == 1)
                ContentTagsAssignedHindi::query()->where('content_id', $id)->where('content_type', $type)->delete();

            foreach ($tags as $associatedTagsNew) {
                ContentTagsAssignedHindi::query()->insert(['content_type' => $type, 'content_id' => $id, 'tag_id' => $associatedTagsNew]);

                //increasing frequency count
                SeoTagHindi::query()->where('tag_id', $associatedTagsNew)->increment('frequency');
            }
        }
    }

    public function createinsightsView(Request $request)
    {
        if ($request->segment(2) == 'en') {
            $kickerData = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
            $kicker     = array_column($kickerData, 'name');
            $authors    = AuthorList::query()->select('author_id', 'title')->where('status', "A")->get();

            $InsightCategory    = InsightCategory::query()->select('id', 'catname')->where('status', 1)->get();
            return view('admin/insights/create_insights', compact('kicker', 'authors', 'InsightCategory'));
        } else {
            $kickerData = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
            $kicker     = array_column($kickerData, 'name');
            $authors    = AuthorList::query()->select('author_id', 'title')->where('status', "A")->get();

            $InsightCategory    = InsightsHindiCategory::query()->select('id', 'catname')->where('status', 1)->get();
            return view('admin/insights/create_hindi_insights', compact('kicker', 'authors', 'InsightCategory'));
        }
    }



    public function createInsights(Request $request)
    {
        //dd($request->all());
        // Validate the input
        $this->validate($request, [
            'insights_publisher' => 'required',
            'insights_type' => 'required',
            'insights_cat' => 'required',
            'title' => 'required|max:255',
            'sub_title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        // Extract variables from the request
        $role = $request->session()->get('role');
        $brand = $request->brands ? $this->stringyfyText($request->brands) : "";
        $title = $request->title;
        $homeTitle = $request->home_title;
        $subTitle = $request->sub_title;
        $desc = $request->input('content');
        $insightsType = $request->insights_type;
        $catId = $request->insights_cat;
        $subcatId = $request->insights_subcat;
        $isInternational = $request->is_intl == 1 ? 1 : 0;

        // Generate slug based on language
        if ($request->segment(2) == 'en') {
            $slug = Str::slug($title);
        } else {
            $titleSlug = preg_replace("/[\s+\?]/", " ", $title);
            $titleSlug = str_replace("  ", " ", $titleSlug);
            $titleSlug = str_replace(" ", "-", $titleSlug);
            $titleSlug = preg_replace("/\s+/", "-", $titleSlug);
            $slug = str_replace(".", "-", $titleSlug);
        }
        // dd($slug);
        // Handle image upload
        $imageUrl = "";
        if ($request->hasFile('image')) {
            $newsImage = $request->file('image');
            $imageUrl = $this->uploadImage($newsImage, 'News', 0, 's3', '');
            // dd($imageUrl);
            $this->thumbnailCreation($imageUrl, 'News', 247, 139);
        }

        // Determine language and model
        $isEnglish = $request->segment(2) == 'en';
        $modelClass = $isEnglish ? InsightList::class : InsightListHindi::class;
        $redirectUrl = $isEnglish ? 'admin/en/list-insights' : 'admin/hi/list-insights';
        // dd($modelClass, $redirectUrl);
        // Create the data object
        $newsData = new $modelClass;
        $newsData->title = $title;
        $newsData->news_type = $role;
        $newsData->homeTitle = $homeTitle;
        $newsData->shortDesc = $subTitle;
        $newsData->content = $desc;
        $newsData->insight_type = $insightsType;
        $newsData->cat_id = $catId;
        $newsData->subcat_id = $subcatId;
        $newsData->related_brand = $brand;
        $newsData->image = $imageUrl;
        $newsData->slug = $slug;
        $newsData->is_intl = $isInternational;
        $newsData->author_id = $request->insights_publisher;

        // Save the data
        if ($newsData->save()) {
            $newsId = $newsData->news_id;

            // Insert associated tags if present
            if ($request->associated_tags) {
                $this->insertAssociatedTags($request->associated_tags, $newsId, 2, 0, $request->segment(2));
            }

            return redirect($redirectUrl)->with('success', 'Insights Data Saved Successfully.');
        } else {
            return redirect($redirectUrl)->with('error', "Insights Data Couldn't Be Saved.");
        }
    }


    public function listinsights(Request $request)
    {
        // Determine the model based on the language segment
        $locale = $request->segment(2);
        $model = ($locale === 'en') ? InsightList::class : InsightListHindi::class;

        // Fetch data with filters
        $data = $model::query()
            ->whereNotIn('news_type', ['ri', 'ir']) // Exclude specific news types
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('news_id', $search);
                });
            })
            ->whereIn('status', [0, 1]) // Filter by status (active/inactive)
            ->orderByDesc('news_id') // Order by descending news ID
            ->paginate(25);

        // Return the view with data
        return view('admin.insights.list-edit-insights', compact('data'));
    }


    public function multilistinsights(Request $request)
    {
        // Determine the model and category model based on the language segment
        $locale = $request->segment(2);
        $model = ($locale === 'en') ? InsightList::class : InsightListHindi::class;
        $catModel = ($locale === 'en') ? InsightCategory::class : InsightsHindiCategory::class;

        // Fetch filtered and paginated data
        $data = $model::with(['category', 'subcategory', 'author'])
            ->whereNotIn('news_type', ['ri', 'ir']) // Exclude specific news types
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('news_id', $search);
                });
            })
            ->whereIn('status', [0, 1]) // Filter by active/inactive status
            ->orderByDesc('news_id') // Order by descending news ID
            ->paginate(30);

        // Fetch dropdown data
        $InsightCategory = $catModel::select('id', 'catname')
            ->where('status', 1)
            ->get();

        $InsightAuthor = AuthorList::select('author_id', 'title', 'slug')
            ->where('status', 'A')
            ->get();

        // Return the view with data
        return view('admin.insights.multilist-edit', compact('data', 'InsightCategory', 'InsightAuthor'));
    }



    public function saveMultipleInsights(Request $request)
    {
        // Determine the model based on language segment
        $model = ($request->segment(2) == 'en') ? InsightList::class : InsightListHindi::class;

        // Get selected articles
        $articles = $request->input('articles', []);

        foreach ($articles as $newsId => $articleDetails) {
            $existingInsight = $model::find($newsId);
            if ($existingInsight) {
                // Update fields dynamically
                $fieldsToUpdate = [
                    'insight_type' => $articleDetails['insight_type'] ?? $existingInsight->insight_type,
                    'cat_id' => $articleDetails['main_category'] ?? $existingInsight->cat_id,
                    'subcat_id' => $articleDetails['sub_category'] ?? $existingInsight->subcat_id,
                    'status' => $articleDetails['status'] ?? $existingInsight->status,
                    'author_id' => $articleDetails['author'] ?? $existingInsight->author_id,
                ];

                // Apply updates
                foreach ($fieldsToUpdate as $field => $value) {
                    $existingInsight->{$field} = $value;
                }

                // Generate slug dynamically
                $existingInsight->slug = Str::slug($existingInsight->title);

                // Save the updated record
                $existingInsight->save();
            }
        }

        return redirect()->back()->with('success', 'Selected articles have been updated successfully!');
    }






    public function editInsightsView(Request $request)
    {
        if ($request->segment(2) == 'en') {

            $newsId             = $request->id;
            $kickerData         = SeoTag::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
            $kicker             = array_column($kickerData, 'name');
            $data               = InsightList::query()->where('news_id', $newsId)->first();

            $InsightCategory    = InsightCategory::query()->where('status', '1')->get();
            // dd($InsightCategory);
            $InsightSubcategory    = InsightSubcategory::query()->where('mcat_id', $data->cat_id)->get();

            $brands             = explode(",", $data->related_brand);

            $authors            = AuthorList::query()->select('author_id', 'title')->where('status', "A")->get();

            //getting brand names to a array
            foreach ($brands as $value) {
                $company[]        = FranchisorBusinessDetail::query()->where('franchisor_id', $value)->select('franchisor_id', 'company_name')->first();
            }
            // dd($company);
            $associatedTags     = ContentTagsAssigned::query()->where('content_id', $newsId)->where('content_type', 2)->select('tag_id')->get();
            $assocTags = [];
            //fetching associated tags to a array
            if ($associatedTags != null) {
                foreach ($associatedTags as $tags) {
                    $assocTags[]    = SeoTag::query()->where('tag_id', $tags->tag_id)->select('tag_id', 'name')->first();
                }
                return view('admin/insights/edit-insights', compact('kicker', 'data', 'assocTags', 'company', 'authors', 'InsightCategory', 'brands', 'InsightSubcategory'));
            }
        } elseif ($request->segment(2) == 'hi') {
            $newsId             = $request->id;
            $kickerData         = SeoTagHindi::query()->select('name')->orderBy('tag_id', 'ASC')->get()->toArray();
            $kicker             = array_column($kickerData, 'name');
            $data               = InsightListHindi::query()->where('news_id', $newsId)->first();

            $InsightCategory    = InsightsHindiCategory::query()->where('status', '1')->get();
            $InsightSubcategory    = InsightsHindiSubCategory::query()->where('mcat_id', $data->cat_id)->get();

            $brands             = explode(",", $data->related_brand);

            $authors            = AuthorList::query()->select('author_id', 'title')->where('status', "A")->get();

            //getting brand names to a array
            foreach ($brands as $value) {
                $company[]        = FranchisorBusinessDetail::query()->where('franchisor_id', $value)->select('franchisor_id', 'company_name')->first();
            }
            // dd($company);
            $associatedTags     = ContentTagsAssignedHindi::query()->where('content_id', $newsId)->where('content_type', 2)->select('tag_id')->get();
            $assocTags = [];
            //fetching associated tags to a array
            if ($associatedTags != null) {
                foreach ($associatedTags as $tags) {
                    $assocTags[]    = SeoTagHindi::query()->where('tag_id', $tags->tag_id)->select('tag_id', 'name')->first();
                }
                return view('admin/insights/edit_hindi_insights', compact('kicker', 'data', 'assocTags', 'company', 'authors', 'InsightCategory', 'brands', 'InsightSubcategory'));
            }
        }
    }


    public function updateInsightStatus(Request $request)
    {
        $newsId    = $request->News;
        $status    = $request->contentStatus;
        if ($request->segment(2) == 'en') {
            InsightList::query()->where('news_id', $newsId)->update(['status' => $status]);
        } else {
            InsightListHindi::query()->where('news_id', $newsId)->update(['status' => $status]);
        }
        return response()->json(array('status' => $status), 200);
    }

    public function updateInsights(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [

            'insights_publisher' => 'required',
            'insights_type' => 'required',
            'insights_cat' => 'required',
            // 'insights_subcat' => 'required',
            'title' => 'required|max:255',
            //'home_title' => 'required',
            'sub_title' => 'required',
            'content' => 'required',
            //'brands' => 'required',
            // 'associated_tags' => 'required',
            // 'image' => 'required',
        ]);
        $role              = $request->session()->get('role');
        $brand             = !empty($request->brands) ? $this->stringyfyText($request->brands) : "";
        $title             = $request->title;
        if (!empty($request->slug)) {
            $slug              = Str::slug($request->slug);
        } else {
            $slug              = Str::slug($title);
        }
        // dd($role);
        $kicker            = $request->kicker;
        $homeTitle         = $request->home_title;
        $subTitle          = $request->sub_title;
        $desc              = $request->input('content');
        $insight_type      = $request->insights_type;
        $cat_id            = $request->insights_cat;
        $subcat_id         = $request->insights_subcat;
        $imageUrl          = $request->old_image;
        $isInternational   = ($request->is_intl == 1) ? 1 : 0;

        //inserting files
        if ($request->hasFile('image')) {

            //Uploading Image
            $newsImage = $request->file('image');
            $imageUrl  = $this->uploadImage($newsImage, 'News', 0, 's3', '');

            //thumbnail creation
            $this->thumbnailCreation($imageUrl, 'News', 247, 139);
        }

        if ($request->segment(2) == 'en') {
            $update = [
                'title'         => $title,
                // 'kicker'        => $kicker,
                'news_type'     => $role,
                'homeTitle'     => $homeTitle,
                'shortDesc'     => $subTitle,
                'content'       => $desc,
                'insight_type'  => $insight_type,
                'cat_id'       => $cat_id,
                'subcat_id'   => $subcat_id,
                //
                'related_brand' => $brand,
                'slug'          => $slug,
                'is_intl'       => $isInternational,
                'updated_by'    => $request->session()->get('adminEmail'),
                'author_id'     => request()->insights_publisher
            ];

            if ($request->hasFile('image'))
                $update['image'] = $imageUrl;

            InsightList::query()->where('news_id', $request->news_id)->update($update);

            //increasing frequency count of kickers
            if (!empty($request->kicker))
                $this->insertKickers($request->kicker, $request->news_id, 2);

            //increasing frequency count of kickers & inserting associative tags
            if (!empty($request->associated_tags))
                $this->insertAssociatedTags($request->associated_tags, $request->news_id, 2, 1, $request->segment(2));

            return redirect('admin/en/list-insights')->with('success', "Insights Data Updated Successfully.");
        } else {
            $update = [
                'title'         => $title,
                // 'kicker'        => $kicker,
                'news_type'     => $role,
                'homeTitle'     => $homeTitle,
                'shortDesc'     => $subTitle,
                'content'       => $desc,
                'insight_type'  => $insight_type,
                'cat_id'       => $cat_id,
                'subcat_id'   => $subcat_id,
                //
                'related_brand' => $brand,
                'slug'          => $slug,
                'is_intl'       => $isInternational,
                'updated_by'    => $request->session()->get('adminEmail'),
                'author_id'     => request()->insights_publisher
            ];

            if ($request->hasFile('image'))
                $update['image'] = $imageUrl;

            InsightListHindi::query()->where('news_id', $request->news_id)->update($update);

            //increasing frequency count of kickers
            if (!empty($request->kicker))
                $this->insertKickers($request->kicker, $request->news_id, 2);

            //increasing frequency count of kickers & inserting associative tags
            if (!empty($request->associated_tags))
                $this->insertAssociatedTags($request->associated_tags, $request->news_id, 2, 1, $request->segment(2));

            return redirect('admin/hi/list-insights')->with('success', "Insights Data Updated Successfully.");
        }
    }


    public function deleteInsights(Request $request)
    {

        $contentId    = $request->contentId;
        $request->contentStatus;
        if ($request->segment(2) == 'en') {
            $Content      = InsightList::query()->where('news_id', $contentId)->delete();
        } else {
            $Content      = InsightListHindi::query()->where('news_id', $contentId)->delete();
        }
        return response()->json(array('Content' => $Content), 200);
    }

    // category functions here

    public function categoryform()
    {
        if (request()->segment(2) != 'hindi') {
            app()->setLocale('en');
            session()->put('locale', 'en');
        } else {
            app()->setLocale('hi');
            session()->put('locale', 'hi');
        }
        return view('admin.category.catform');
    }

    public function storecat(Request $request)
    {
        $lang = $request->segment(2);
        // dd($lang);
        $catclass =  $lang == 'en' ? InsightCategory::query() : InsightsHindiCategory::query();
        $catCount   = $catclass->where('catname', $request->maincat)->select('catname')->count();
        // dd($request->maincat);
        if ($catCount == 0) {
            $cslug = Str::slug($request->maincat);
            // dd($cslug);
            if ($lang == 'hi') {
                $catclass->insert(['catname' => request()->maincat, 'slug' => request()->slug]);
            } else {
                $catclass->insert(['catname' => request()->maincat, 'slug' => $cslug]);
            }
        } else {
            session()->flash('failed', 'This Main Category already Exists');
            return redirect()->back();
        }

        return redirect('/admin/' . $lang . '/cat/list')->with('success', "Main Category Created Successfully.");
    }
    public function catlist(Request $request)
    {
        $locale = $request->segment(2); // Retrieve the locale
        $search = $request->input('search'); // Retrieve the search input

        // Determine the model based on the locale
        $categoryModel = $locale === 'en' ? InsightCategory::class : InsightsHindiCategory::class;

        // Build the query
        $catdata = $categoryModel::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('catname', 'LIKE', "%{$search}%")
                        ->orWhere('id', $search);
                });
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.category.list', compact('catdata'));
    }


    public function deleteCat(Request $request)
    {
        try {
            // Determine the model class based on the locale
            $locale = $request->segment(2);
            $catclass = $locale == 'en' ? InsightCategory::class : InsightsHindiCategory::class;

            // Find and delete the category
            $category = $catclass::findOrFail($request->id);
            $category->delete();

            // Set a success message in the session
            return redirect()->back()->with('success', 'Main Category Deleted Successfully.');
        } catch (\Exception $e) {
            // Handle unexpected errors
            return redirect()->back()->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }


    public function subcatform()
    {
        $locale = request()->segment(2);
        $cat =  $locale == 'en' ? InsightCategory::all() : InsightsHindiCategory::all();

        return view('admin.subcategory.create', compact('cat'));
    }

    public function storesubcat(Request $request)
    {
        // Determine the locale and model class
        $locale = request()->segment(2);
        $subcatclass = $locale == 'en' ? InsightSubcategory::query() : InsightsHindiSubCategory::query();

        // Main category ID and subcategories
        $maincatid = $request->maincat;
        $subcategories = $request->sub_categories;

        // Handle slugs (string or array)
        $slugs = [];
        if ($locale == 'hi') {
            if (is_array($request->sub_catslug)) {
                foreach ($request->sub_catslug as $slugValue) {
                    $slugs = array_merge($slugs, explode(',', $slugValue));
                }
            } else {
                $slugs = explode(',', $request->sub_catslug);
            }

            // Trim and clean slugs
            $slugs = array_map('trim', $slugs);
        }

        foreach ($subcategories as $key => $subcategoryName) {
            // Check if the subcategory already exists
            $exists = $subcatclass->where('mcat_id', $maincatid)
                ->where('subcat_name', $subcategoryName)
                ->exists();

            if (!$exists) {
                // Generate slug based on locale
                if ($locale == 'en') {
                    $finalSlug = Str::slug($subcategoryName);
                } else {
                    $finalSlug = isset($slugs[$key]) ? $slugs[$key] : Str::slug($subcategoryName);
                }

                // Insert the new subcategory
                $subcatclass->create([
                    'mcat_id' => $maincatid,
                    'subcat_name' => $subcategoryName,
                    'slug' => $finalSlug,
                ]);
            } else {
                // Flash error message and return if a subcategory exists
                session()->flash('failed', "Sub Category '{$subcategoryName}' already exists.");
                return redirect()->back();
            }
        }

        // Redirect with success message
        return redirect('/admin/' . $locale . '/subcat/list')
            ->with('success', 'Sub Category Created Successfully.');
    }




    public function subcatlist(Request $request)
    {
        $locale = $request->segment(2); // Use $request for consistency
        $search = $request->input('search'); // Retrieve search input

        // Determine the model based on locale
        $subcatModel = $locale === 'en' ? InsightSubcategory::class : InsightsHindiSubcategory::class;

        // Build the query
        $subCat = $subcatModel::with('category')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('subcat_name', 'LIKE', "%{$search}%")
                        ->orWhere('id', $search);
                });
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.subcategory.list', compact('subCat'));
    }


    public function deletesubCat(Request $request)
    {
        // Determine the appropriate subcategory model based on the locale
        try {
            $locale = $request->segment(2);
            $subcatclass = $locale == 'en'
                ? InsightSubcategory::class
                : InsightsHindiSubCategory::class;

            // Find and delete the subcategory
            $subcategory = $subcatclass::findOrFail($request->id);
            $subcategory->delete();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Sub Category Deleted Successfully.');
        } catch (\Exception $e) {
            // Handle unexpected errors
            return redirect()->back()->with('error', 'Failed to delete sub category: ' . $e->getMessage());
        }
    }

    public function podcastcreate(Request $request)
    {
        // $locale = $request->segment(2);
        return view('admin.podcast.create');
    }


    public function podcastore(Request $request)
    {
        //dd($request->all());
        try {
            $validator = validator($request->all(), [
                'podcastId' => 'required',
                'Podcast_url' => 'required|unique:fihl_podcstvideo,podcast_link',
                'title' => 'required',
                'image' => 'nullable|file', // Make image optional if not always provided
                'podcast_dur' => 'required',
                'podcast_lang' => 'required',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $fihlvideo = new FihlPodcastVideo();

            $fihlvideo->podcast_id = $request->input('podcastId');
            $fihlvideo->podcast_link = $request->input('Podcast_url');
            $fihlvideo->title = $request->input('title');
            $fihlvideo->pod_lang = $request->input('podcast_lang');
            $fihlvideo->duration = $request->input('podcast_dur');
            $fihlvideo->podcast_type = 'A';
            $fihlvideo->status = 'A';
            $fihlvideo->category = 0;
            $fihlvideo->description = $request->input('content');
            $fihlvideo->create_date = Carbon::now();

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Define the upload path based on language
                $uploadPath =  config("constants.ARTICLE_UPLOAD_PATH");

                // Resize the image using Image Intervention (optional)
                $resizedImage = Image::make($image)->resize(478, 478)->encode('webp', 90);

                // Generate a unique image name (e.g., timestamp-based)
                $imageName = time() . '.webp';

                // Save the resized image to S3
                $path = Storage::disk('s3')->put($uploadPath . $imageName, $resizedImage->__toString(), 'public');

                // Now that the image is uploaded, save the full URL to the database
                if ($path) {
                    $fihlvideo->image_path = $imageName; // Full S3 URL
                    $fihlvideo->image = $imageName; // Full S3 URL
                }
            }


            // Save the podcast record
            $fihlvideo->save();
            // Redirect after success
            if ($request->podcast_lang == 'en') {
                return redirect()->route('podcastlist')->with("success", 'Podcast Has Been Added');
            } else {
                return redirect()->route('hindipodcastlist')->with("success", 'Podcast Has Been Added');
            }
        } catch (\Exception $e) {
            // Log the error and return a failure response
            Log::error('Error in podcastore: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the podcast.');
        }
    }


    public function podcastlist(Request $request)
    {
        $locale = $request->segment(2); // Use $request for consistency
        $search = $request->input('search'); // Retrieve search input

        $podlist = FihlPodcastVideo::query()
            ->where('podcast_type', 'A')
            ->where('pod_lang', $locale)
            ->whereIn('status', ['A', 'D'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('podcast_id', $search);
                });
            })
            ->orderByDesc('create_date')
            ->paginate(10);

        return view('admin.podcast.podlist', compact('podlist'));
    }


    public function updatepodcastatus(Request $request)
    {
        // dd($request->all());
        $podcastId    = $request->podcast_id;
        $status    = $request->status;
        $locale = $request->segment(2);
        $podstatus = FihlPodcastVideo::query()->where('sno', $podcastId)->update(['status' => $status]);
        // dd($podstatus);
        return response()->json(array('status' => $status), 200);
    }

    public function deletepodcast(Request $request)
    {
        // dd($request->all());
        FihlPodcastVideo::query()->where('sno', $request->sno)->delete();
        return response()->json(array('status' => 1), 200);
    }

    public function editpodcast(Request $request)
    {
        // dd($request->sno);
        $locale = request()->segment(2);
        $data = FihlPodcastVideo::query()->where('sno', $request->sno)->first();
        // dd($data);
        return view('admin.podcast.edit', compact('data'));
    }

    public function podcastUpdate(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'podcastId'     => 'required',
            'Podcast_url'   => 'required',
            'title'         => 'required',
            'podcast_dur'   => 'required',
            'podcast_lang'  => 'required',
            'content'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find the existing podcast record
            $video = FihlPodcastVideo::where('sno', $request->p_id)->first();

            if (!$video) {
                return redirect()->back()->with('error', 'Podcast not found.');
            }

            // Handle image upload if provided
            $fimage = $video->image_path; // Default to existing image path

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Define the upload path for S3
                $uploadPath = config("constants.ARTICLE_UPLOAD_PATH");

                // Resize the image using Image Intervention (optional)
                $resizedImage = Image::make($image)->resize(478, 478)->encode('webp', 90);

                // Generate a unique filename
                $imageName = time() . '.webp'; // Unique file name based on the current time

                // Save the image to S3
                $path = Storage::getFacadeRoot()->disk('s3')->put($uploadPath . $imageName, $resizedImage->__toString(), 'public');

                // Generate the full URL of the image on S3
                if ($path) {
                    $fimage = $imageName; // Full S3 URL
                }
            }


            // Update the podcast attributes
            $updateData = [
                'podcast_id'   => $request->input('podcastId'),
                'podcast_link' => $request->input('Podcast_url'),
                'title'        => $request->input('title'),
                'image_path'   => $fimage,
                'image'   => $fimage,
                'duration'     => $request->input('podcast_dur'),
                'pod_lang'     => $request->input('podcast_lang'),
                'status'       => $request->input('status', 'A'),
                'podcast_type' => 'A', // Fixed type
                'description'  => $request->input('content'),
            ];

            Log::info('Podcast Update Data', $updateData);
            $video->update($updateData);


            // Redirect based on language
            $route = $request->podcast_lang === 'en' ? 'podcastlist' : 'hindipodcastlist';
            return redirect()->route($route)->with('success', 'Podcast has been updated successfully.');
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Error in podcastUpdate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the podcast.');
        }
    }

    public function videolist(Request $request)
    {
        $locale = $request->segment(2); // Use $request for consistency
        $search = $request->input('search');

        // Build the query
        $videos = FihlPodcastVideo::query()
            ->with('VideoCategory')
            ->whereIn('status', ['A', 'D'])
            ->where('podcast_type', 'v')
            ->where('pod_lang', $locale)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('videoID', $search);
                });
            })
            ->orderBy('create_date', 'desc')
            ->paginate(20);

        return view('admin.videos.videolist', compact('videos'));
    }


    public function videocreate()
    {
        $category = FihlVideoCategory::all();
        return view('admin.videos.videocreate', compact('category'));
    }

    public function videostore(Request $request)
    {

        // dd($request->all());
        try {
            $validator = validator($request->all(), [
                'videoId' => 'required',
                'category' => 'required',
                'title' => 'required',
                'video_duration' => 'required',
                'pod_lang' => 'required',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $fihlvideo = new FihlPodcastVideo();

            $fihlvideo->videoID = $request->input('videoId');
            // $fihlvideo->podcast_link = $request->input('Podcast_url');
            $fihlvideo->title = $request->input('title');
            $fihlvideo->pod_lang = $request->input('pod_lang');
            $fihlvideo->duration = $request->input('video_duration');
            $fihlvideo->podcast_type = 'V';
            $fihlvideo->status = 'A';
            $fihlvideo->category = $request->input('category');
            $fihlvideo->description = $request->input('content');
            $fihlvideo->create_date = Carbon::now();

            // Save the podcast record
            $fihlvideo->save();
            // Redirect after success
            if ($request->pod_lang == 'en') {
                return redirect()->route('videolist')->with("success", 'Video Has Been Added');
            } else {
                return redirect()->route('hindivideolist')->with("success", 'Video Has Been Added');
            }
        } catch (\Exception $e) {
            // Log the error and return a failure response
            Log::error('Error in podcastore: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the video.');
        }
    }

    public function updatevideostatus(Request $request)
    {
        // dd($request->all());
        $podcastId    = $request->video_id;
        $status    = $request->status;
        // $locale = $request->segment(2);
        $podstatus = FihlPodcastVideo::query()->where('sno', $podcastId)->update(['status' => $status]);
        // dd($podstatus);
        return response()->json(array('status' => $status), 200);
    }

    public function editvideo(Request $request)
    {
        // dd($request->sno);
        $locale = request()->segment(2);
        $category = FihlVideoCategory::all();
        $data = FihlPodcastVideo::query()->where('sno', $request->sno)->first();
        // dd($data);
        return view('admin.videos.videoedit', compact('data', 'category'));
    }

    public function videoUpdate(Request $request)
    {
        // dd($request->all());fv
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'videoId'     => 'required',
            'category'   => 'required',
            'title'         => 'required',
            'video_duration'   => 'required',
            'pod_lang'  => 'required',
            'content'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find the existing podcast record
            $video = FihlPodcastVideo::where('sno', $request->sno)->first();

            if (!$video) {
                return redirect()->back()->with('error', 'Video not found.');
            }


            // Update the podcast attributes
            $updateData = [
                'podcast_id'   => $request->input('videoId'),
                'category' => $request->input('category'),
                'title'        => $request->input('title'),
                // 'image_path'   => $fimage,
                // 'image'   => $fimage,
                'duration'     => $request->input('video_duration'),
                'pod_lang'     => $request->input('pod_lang'),
                'status'       => $request->input('status', 'A'),
                'podcast_type' => 'V', // Fixed type
                'description'  => $request->input('content'),
            ];

            Log::info('Video Update Data', $updateData);
            $video->update($updateData);


            // Redirect based on language
            $route = $request->video_lang === 'en' ? 'videolist' : 'hindivideolist';
            return redirect()->route($route)->with('success', 'Video has been updated successfully.');
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Error in VideoUpdate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the Video.');
        }
    }

    public function deletevideo(Request $request)
    {
        // dd($request->all());
        FihlPodcastVideo::query()->where('sno', $request->sno)->delete();
        return response()->json(array('status' => 1), 200);
    }

    public function getSubcategories($catid)
    {
        // Determine the appropriate model based on the locale
        $locale = request()->segment(2);
        $model = $locale === 'en' ? InsightSubcategory::class : InsightsHindiSubCategory::class;

        // Fetch subcategories
        $subcategories = $model::select('id', 'subcat_name')->where('mcat_id', $catid)->get();

        // Return JSON response
        return response()->json($subcategories);
    }


    public static function createimgurl($image, $lang)
    {
        // dd($image);
        if ($image) {
            $iscont = strstr($image, "/");
            $isHttps = strstr($image, 'https');
            if ($isHttps) {
                $url =  trim($image, '/');
                // dd($url);
            } else {

                if ($iscont) {
                    $url =  Config('constants.franAwsS3Url') . trim($image, '/');
                    // dd($url);
                } else {
                    if ($lang != 'en') {

                        $url = Config('constants.franAwsS3Url') . Config('constants.ARTICLE_HINDI_UPLOAD_PATH') . trim($image);
                        // dd($url);
                    } else if ($lang != 'hi') {

                        $url = Config('constants.franAwsS3Url') . Config('constants.ARTICLE_UPLOAD_PATH') . trim($image);
                    }
                }
            }
        } else {
            $url = url('/img/602a695853d99.jpeg');
        }

        // dd($url);
        return $url;
    }

    public function getauthors(Request $request){
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $class = AuthorList::query();
            $data = $class->select("author_id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->where('status', 1)
                ->get();
        }
        return response()->json($data);
    }
}
