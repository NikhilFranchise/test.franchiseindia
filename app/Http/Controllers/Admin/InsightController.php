<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorList;
use App\Models\ContentTagsAssigned;
use App\Models\ContentTagsAssignedHindi;
use App\Models\FranchisorBusinessDetail;
use App\Models\InsightCategory;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use App\Models\InsightsHindiCategory;
use App\Models\InsightsHindiSubCategory;
use App\Models\InsightSubcategory;
use App\Models\SeoTag;
use App\Models\SeoTagHindi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InsightController extends Controller
{
    public function createInsights($lang)
    {
        $catModel = ($lang === 'en') ? InsightCategory::class : InsightsHindiCategory::class;
        $tagModel = ($lang === 'en') ? SeoTag::class : SeoTagHindi::class;

        $user   = Auth::guard('admin')->user();
        $author = $user->author;

        if ($author) {
            // Author role: only their own author record
            $authorData = collect([[
                'author_id' => $author->author_id,
                'title'     => $author->title,
            ]]);
        } else {
            // Admin/Manager role: all authors under this admin
            $authorData = AuthorList::query()
                ->where('admin_id', $user->admin_id)
                ->get(['author_id', 'title']);
        }

        $InsightCategory = $catModel::select('id', 'catname')->get();
        $InsightsTag     = $tagModel::pluck('name')->toArray();
        $role            = $user->admin_role; // assuming 'role' column

        return view('admin.insights.create', compact(
            'lang',
            'InsightCategory',
            'InsightsTag',
            'authorData',
            'role'
        ));
    }

    public function storeInsights(Request $request, $lang)
    {
        $adminController = new \App\Http\Controllers\Admin\AdminController();

        // ---------------------------
        // 1. Validate request
        // ---------------------------
        $request->validate([
            'insights_publisher' => 'required',
            'insights_type'      => 'required',
            'insights_cat'       => 'required',
            'title'              => 'required|max:255',
            'sub_title'          => 'required',
            'content'            => 'required',
            'image'              => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:307200',
        ]);

        // ---------------------------
        // 2. Prepare slug
        // ---------------------------
        $slug = $request->slug ?: $request->title;

        if ($lang !== 'en') {
            $slug = trim($slug);
            $slug = mb_strtolower($slug, 'UTF-8');
            $slug = preg_replace("/[^a-z0-9\s\p{Devanagari}]/u", '', $slug);
            $slug = preg_replace("/\s+/", ' ', $slug);
            $slug = str_replace([' ', '.'], '-', $slug);
        } else {
            $slug = Str::slug($slug);
        }

        // ---------------------------
        // 3. Handle image upload
        // ---------------------------
        $imageUrl = '';
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageUrl = $adminController->uploadImage($imageFile, $request->insights_type, 0, 's3', '');
            $adminController->thumbnailCreation($imageUrl, $request->insights_type, 247, 139);
            // dd($imageUrl, $thumbnail);
        }
        // dd('heelo');
        // ---------------------------
        // 4. Determine model and redirect URL
        // ---------------------------
        $modelClass = $lang === 'en' ? InsightList::class : InsightListHindi::class;
        $redirectUrl = route('insights.list', ['lang' => $lang]);

        // ---------------------------
        // 5. Save the insight
        // ---------------------------
        $insight = new $modelClass();
        $insight->title        = $request->title;
        $insight->shortDesc    = $request->sub_title;
        $insight->content      = $request->content;
        $insight->news_type    = session()->get('role', 'fi');
        $insight->insight_type = $request->insights_type;
        $insight->cat_id       = $request->insights_cat;
        $insight->subcat_id    = $request->insights_subcat;
        $insight->image        = $imageUrl;
        $insight->img_alt      = $request->img_alt;
        $insight->slug         = $slug;
        $insight->author_id    = $request->insights_publisher;
        $insight->updated_by   = Auth::guard('admin')->user()->admin_email;

        if ($request->scheduled_at) {
            $insight->scheduled_at = $request->scheduled_at;
            $insight->status = 3; // scheduled
        } else {
            $insight->status = 2; // preview
            // $insight->time = now(); // your publish time column
        }

        if (!$insight->save()) {
            return redirect($redirectUrl)->with('error', "Insights " . $request->insights_type . " Couldn't Be Saved.");
        }

        // ---------------------------
        // 6. Handle associated tags
        // ---------------------------
        if ($request->has('associated_tags')) {
            $adminController->insertAssociatedTags(
                $request->associated_tags,
                $insight->news_id,
                2,
                0,
                $lang
            );
        }

        return redirect($redirectUrl)
            ->with('success', 'Insights ' . $request->insights_type . ' Saved Successfully.');
    }

    public function listinsights(Request $request, $lang)
    {

        $model = ($lang === 'en') ? InsightList::class : InsightListHindi::class;
        $catModel = ($lang === 'en') ? InsightCategory::class : InsightsHindiCategory::class;
        $authorModel = AuthorList::class;
        $search = $request->query('search');
        $type = $request->query('type');
        $ctgry = $request->query('category');
        $authorFilter = $request->query('author');
        $categoryName = null;
        $authorName = null;
        $query = $model::query()->with(['category:id,catname', 'author:author_id,title'])
            ->whereNotIn('news_type', ['ri', 'ir'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('news_id', $search);
                });
            })
            ->when($type, function ($query) use ($type) {
                $query->where('insight_type', $type);
            })
            ->when($authorFilter, function ($query) use ($authorFilter, $authorModel, &$authorName) {
                $query->where('author_id', $authorFilter);
                $authorName = $authorModel::where('author_id', $authorFilter)->value('title');
            })
            ->when($ctgry, function ($query) use ($ctgry, $catModel, &$categoryName) {
                $query->where('cat_id', $ctgry);
                $categoryName = $catModel::where('id', $ctgry)->value('catname');
            })
            ->whereIn('status', [0, 1, 2, 3]);

        // 👉 Export to CSV if ?export=1 is present
        if ($request->has('export')) {
            $filename = "insightsData_" . now()->format('Y-m-d_H-i-s') . ".csv";
            $data = $query->with('category')->orderByDesc('news_id')->get();

            $headers = [
                "Content-Type" => "text/csv",
                "Content-Disposition" => "attachment; filename=\"$filename\"",
            ];

            $columns = ['Id', 'Title', 'Insight Type', 'Category', 'Status', 'Created Date'];

            $callback = function () use ($data, $columns) {
                $file = fopen('php://output', 'w');
                fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($file, $columns);

                foreach ($data as $row) {
                    fputcsv($file, [
                        $row->news_id,
                        $row->title,
                        $row->insight_type,
                        $row->category->first()->catname ?? '',
                        $row->status,
                        date('d-m-Y', strtotime($row->created_at)),
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        // Normal listing view logic
        $totalRecords = $query->count();
        $insightTypes = $model::distinct()->pluck('insight_type');
        $InsightsCategory = $catModel::select('id', 'catname')->get();
        $Authors = AuthorList::select('author_id', 'title')
            ->where('status', 'A')
            ->get();
        $data = $query->orderByDesc('news_id')
            ->paginate(25)
            ->appends(['search' => $search, 'type' => $type, 'category' => $ctgry, 'author' => $authorFilter]);
        // dd($data);
        return view('admin.insights.list', compact(
            'lang',
            'data',
            'totalRecords',
            'insightTypes',
            'type',
            'InsightsCategory',
            'categoryName',
            'authorFilter',
            'Authors',
            'authorName'
        ));
    }

    public function editInsights($lang, $id)
    {
        // Dynamically assign models based on language
        $seoModel           = $lang === 'en' ? SeoTag::class : SeoTagHindi::class;
        $insightModel       = $lang === 'en' ? InsightList::class : InsightListHindi::class;
        $catModel           = $lang === 'en' ? InsightCategory::class : InsightsHindiCategory::class;
        $subCatModel        = $lang === 'en' ? InsightSubcategory::class : InsightsHindiSubCategory::class;
        $contentAssignModel = $lang === 'en' ? ContentTagsAssigned::class : ContentTagsAssignedHindi::class;

        // Kickers
        $tags = $seoModel::query()->orderBy('tag_id', 'ASC')->pluck('name')->toArray();

        // Insight data
        $data = $insightModel::query()->with('author')->findOrFail($id);

        // Categories and Subcategories
        $InsightCategory    = $catModel::query()->where('status', '1')->get();
        $InsightSubcategory = $subCatModel::query()->where('mcat_id', $data->cat_id)->get();

        // Related Brands
        $brands = explode(",", $data->related_brand ?? '');
        // $company = FranchisorBusinessDetail::query()
        //     ->whereIn('franchisor_id', $brands)
        //     ->select('franchisor_id', 'company_name')
        //     ->get();

        // Authenticated user
        $user  = Auth::guard('admin')->user();
        $role  = $user->admin_role; // assuming this column exists
        // $author = $user->author;   // assuming relation is defined

        // Role-based Author Data
        $authorData = $data->author->first() ? collect([[
            'author_id' => $data->author->first()->author_id,
            'title'     => $data->author->first()->title,
        ]]) : collect();

        // Associated Tags
        $tagIds = $contentAssignModel::query()
            ->where('content_id', $id)
            ->where('content_type', 2)
            ->pluck('tag_id')
            ->toArray();

        $assocTags = $seoModel::query()
            ->whereIn('tag_id', $tagIds)
            ->select('tag_id', 'name')
            ->get();

        // View
        $view = 'admin.insights.edit';

        return view($view, compact(
            'tags',
            'data',
            'assocTags',
            // 'company',
            'authorData',   // role-based authors
            'role',         // current user role
            'InsightCategory',
            'brands',
            'InsightSubcategory',
            'lang'
        ));
    }

    public function updateInsights(Request $request, $lang)
    {
        // ---------------------------
        // 1. Validate request
        // ---------------------------
        $request->validate([
            'insights_publisher' => 'required',
            'insights_type'      => 'required',
            'insights_cat'       => 'required',
            'title'              => 'required|max:255',
            'sub_title'          => 'required',
            'content'            => 'required',
        ]);

        $role            = $request->session()->get('role', 'fi');
        // $brand           = $request->brands ? $this->stringyfyText($request->brands) : "";
        $title           = $request->title;
        // $homeTitle       = $request->home_title;
        $subTitle        = $request->sub_title;
        $desc            = $request->input('content');
        $insight_type    = $request->insights_type;
        $cat_id          = $request->insights_cat;
        $subcat_id       = $request->insights_subcat;
        // $isInternational = ($request->is_intl == 1) ? 1 : 0;
        $alt             = $request->img_alt;
        $published_date  = $request->published_date;

        // ---------------------------
        // 2. Slug Handling
        // ---------------------------
        if (!empty($request->slug)) {
            $slug = $lang === 'en' ? Str::slug($request->slug) : $request->slug;
        } else {
            $slug = Str::slug($title);
        }

        // ---------------------------
        // 3. Image Upload + Thumbnail
        // ---------------------------
        $imageUrl = $request->old_image;
        $adminController = new \App\Http\Controllers\Admin\AdminController();
        if ($request->hasFile('image')) {
            $newsImage = $request->file('image');
            $imageUrl  = $adminController->uploadImage($newsImage, $insight_type, 0, 's3', '');
            $adminController->thumbnailCreation($imageUrl, $insight_type, 247, 139);
        }

        // ---------------------------
        // 4. Common Update Array
        // ---------------------------
        $update = [
            'title'          => $title,
            'news_type'      => $role,
            // 'homeTitle'      => $homeTitle,
            'shortDesc'      => $subTitle,
            'content'        => $desc,
            'insight_type'   => $insight_type,
            'cat_id'         => $cat_id,
            'subcat_id'      => $subcat_id,
            // 'related_brand'  => $brand,
            'slug'           => $slug,
            // 'is_intl'        => $isInternational,
            'updated_by'     => Auth::guard('admin')->user()->admin_email,
            'author_id'      => $request->insights_publisher,
            'img_alt'        => $alt,
            'published_date' => $published_date,
        ];

        if ($request->hasFile('image')) {
            $update['image'] = $imageUrl;
        }

        // ---------------------------
        // 5. Choose Model Dynamically
        // ---------------------------
        $model = $lang === 'en' ? InsightList::class : InsightListHindi::class;
        $model::query()->where('news_id', $request->news_id)->update($update);

        // ---------------------------
        // 6. Kickers + Associated Tags
        // ---------------------------
        // if (!empty($request->kicker)) {
        //     $this->insertKickers($request->kicker, $request->news_id, 2);
        // }

        if (!empty($request->associated_tags)) {
            $adminController->insertAssociatedTags($request->associated_tags, $request->news_id, 2, 1, $lang);
        }

        // ---------------------------
        // 7. Redirect
        // ---------------------------
        return redirect()->route('insights.list', ['lang' => $lang])
            ->with('success', "Insights " . $insight_type . " Updated Successfully.");
    }

    public function deleteInsights(Request $request, $lang)
    {
        $insightId    = $request->insightId;
        $insightType = $request->insightType;
        $model = ($lang === 'en') ? InsightList::class : InsightListHindi::class;
        $data = $model::find($insightId);
        if (!$data) {
            return response()->json(['error' => 'Insight not found.'], 404);
        }
        $model::query()->where('news_id', $insightId)->where('insight_type', $insightType)->delete();

        return redirect()->route('insights.list', ['lang' => $lang])->with('success', $insightType . ' Deleted Successfully.');
    }

    public function status(Request $request, $lang)
    {
        $newsId    = $request->id;
        $status    = $request->status;
        $model = ($lang === 'en') ? InsightList::class : InsightListHindi::class;
        $model::query()->where('news_id', $newsId)->update(['status' => $status]);

        return response()->json(['success' => 'Status updated successfully.', 'status' => $status]);
    }

    public function insightsRecords(Request $request, $lang)
    {
        $model = ($lang === 'en') ? InsightList::class : InsightListHindi::class;
        $catModel = ($lang === 'en') ? InsightCategory::class : InsightsHindiCategory::class;

        // Fetch query parameters
        $search = $request->query('search');
        $type = $request->query('type');
        $ctgry = $request->query('category');
        $categoryName = null;

        // Build the query with filters
        $query = $model::with(['category', 'subcategory', 'author'])
            ->whereNotIn('news_type', ['ri', 'ir']) // Exclude specific news types
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('news_id', $search);
                });
            })
            ->when($type, function ($query) use ($type) {
                $query->where('insight_type', $type);
            })
            ->when($ctgry, function ($query) use ($ctgry, $catModel, &$categoryName) {
                $query->where('cat_id', $ctgry);
                $categoryName = $catModel::where('id', $ctgry)->value('catname');
            })
            ->whereIn('status', [0, 1, 2]); // Filter by active/inactive status

        if ($request->has('export')) {
            $filename = "insightsData_" . now()->format('Y-m-d_H-i-s') . ".csv";
            $data = $query->with('category')->orderByDesc('news_id')->get();

            $headers = [
                "Content-Type" => "text/csv",
                "Content-Disposition" => "attachment; filename=\"$filename\"",
            ];

            $columns = ['news_id', 'title', 'insight_type', 'catname', 'status', 'created_at'];

            $callback = function () use ($data, $columns) {
                $file = fopen('php://output', 'w');
                fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($file, $columns);

                foreach ($data as $row) {
                    fputcsv($file, [
                        $row->news_id,
                        $row->title,
                        $row->insight_type,
                        // $row->cat_id,
                        optional($row->category)->catname ?? '',
                        $row->status,
                        $row->created_at,
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        // Get total records count
        $totalRecords = $query->count();

        // Fetch paginated data
        $data = $query->orderByDesc('news_id')
            ->paginate(20)
            ->appends(['search' => $search, 'type' => $type, 'category' => $ctgry]);

        // Get distinct insight types
        $insightTypes = $model::distinct()->pluck('insight_type');

        // Fetch dropdown data
        $InsightCategory = $catModel::select('id', 'catname')
            ->where('status', 1)
            ->get();

        $InsightAuthor = AuthorList::select('author_id', 'title', 'slug')
            ->where('status', 'A')
            ->get();

        // Return the view with data
        return view('admin.insights.quick-edit', compact(
            'data',
            'InsightCategory',
            'categoryName',
            'InsightAuthor',
            'totalRecords',
            'insightTypes',
            'lang'
        ));
    }

    public function saveMultipleInsights(Request $request, $lang)
    {
        // dd($request->all(), $lang);
        // Determine the model based on language segment
        $model = ($lang == 'en') ? InsightList::class : InsightListHindi::class;
        $catmodel = ($lang == 'en') ? InsightCategory::class : InsightsHindiCategory::class;
        $subCatModel = ($lang == 'en') ? InsightSubcategory::class : InsightsHindiSubCategory::class;
        $adminController = new \App\Http\Controllers\Admin\AdminController();
        // Get selected articles
        $articles = $request->input('articles', []);
        // dd($articles);
        foreach ($articles as $newsId => $articleDetails) {
            $existingInsight = $model::find($newsId);
            // dd($existingInsight, $articleDetails['associated_tags']);
            if ($existingInsight) {
                $associatedTags = isset($articleDetails['associated_tags'])
                    ? explode(',', $articleDetails['associated_tags'])
                    : [];
                // Retrieve new category and sub-category
                $newCatId = $articleDetails['main_category'] ?? $existingInsight->cat_id;
                $newSubCatId = $articleDetails['sub_category'] ?? $existingInsight->subcat_id;

                // Validate sub-category: If it doesn't belong to the selected category, set it to null
                $isValidSubCategory = $subCatModel::query()
                    ->where('mcat_id', $newCatId)
                    ->where('id', $newSubCatId)
                    ->exists();

                if ($newCatId != $existingInsight->cat_id && !$isValidSubCategory) {
                    $newSubCatId = null;
                }

                // Update fields dynamically
                $fieldsToUpdate = [
                    'insight_type' => $articleDetails['insight_type'] ?? $existingInsight->insight_type,
                    'cat_id' => $newCatId,
                    'subcat_id' => $newSubCatId,
                    'status' => $articleDetails['status'] ?? $existingInsight->status,
                    'author_id' => $articleDetails['author'] ?? $existingInsight->author_id,
                ];
                // dd($fieldsToUpdate);

                // Apply updates
                foreach ($fieldsToUpdate as $field => $value) {
                    $existingInsight->{$field} = $value;
                }

                // Generate slug dynamically
                $existingInsight->slug = Str::slug($existingInsight->title);

                // Save the updated record
                $existingInsight->save();
                // Insert associated tags if provided
                if (!empty($associatedTags)) {
                    $adminController->insertAssociatedTags($associatedTags, $newsId, 2, 0, $lang);
                }
            }
        }

        return redirect()->back()->with('success', 'Selected Records have been updated successfully!');
    }
}
