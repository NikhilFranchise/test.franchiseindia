<?php

namespace App\Http\Controllers\Crre\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crre\CrreAuthors;
use App\Models\Crre\CrreCategory;
use App\Models\Crre\CrreContentAssignedTags;
use App\Models\Crre\CrreContentAssignedTagsHindi;
use App\Models\Crre\CrreContentList;
use App\Models\Crre\CrreHindiCategory;
use App\Models\Crre\CrreHindiContentList;
use App\Models\Crre\CrreHindiSubCategory;
use App\Models\Crre\CrreSeotags;
use App\Models\Crre\CrreSeotagshindi;
use App\Models\Crre\CrreSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function createContent($lang)
    {
        $catModel = ($lang === 'en') ? CrreCategory::class : CrreHindiCategory::class;
        $tagModel = ($lang === 'en') ? CrreSeotags::class : CrreSeotagshindi::class;

        $user   = Auth::guard('crreAdmin')->user();
        $author = $user->author;

        if ($author) {
            // Author role: only their own author record
            $authorData = collect([[
                'author_id' => $author->author_id,
                'title'     => $author->title,
            ]]);
        } else {
            // Admin/Manager role: all authors under this admin
            $authorData = CrreAuthors::query()
                ->where('admin_id', $user->admin_id)
                ->get(['author_id', 'title']);
        }

        $InsightCategory = $catModel::select('id', 'catname')->get();
        $InsightsTag     = $tagModel::pluck('name')->toArray();
        $role            = $user->admin_role; // assuming 'role' column

        return view('crreAdmin.insights.create', compact(
            'lang',
            'InsightCategory',
            'InsightsTag',
            'authorData',
            'role'
        ));
    }

    public function storeContent(Request $request, $lang)
    {
        $adminController = new \App\Http\Controllers\Admin\AdminController();


        $request->validate([
            'insights_publisher' => 'required',
            'insights_type'      => 'required',
            'insights_cat'       => 'required',
            'title'              => 'required|max:255',
            'sub_title'          => 'required',
            'content'            => 'required',
            'image'              => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:307200',
        ]);


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
        $imageUrl = '';
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageUrl = $adminController->uploadImage($imageFile, $request->insights_type, 0, 's3', '');
            $adminController->thumbnailCreation($imageUrl, $request->insights_type, 247, 139);
        }
        $modelClass = $lang === 'en' ? CrreContentList::class : CrreHindiContentList::class;
        $redirectUrl = route('crreAdmin.content.list', ['lang' => $lang]);


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
        $insight->updated_by   = Auth::guard('crreAdmin')->user()->admin_email;

        if ($request->scheduled_at) {
            $insight->scheduled_at = $request->scheduled_at;
            $insight->status = 3; // scheduled
        } else {
            $insight->status = 2; // preview
            // $insight->time = now(); // your publish time column
        }

        if (!$insight->save()) {
            return redirect($redirectUrl)->with('error', "Content " . $request->insights_type . " Couldn't Be Saved.");
        }

        // 6. Handle associated tags
        if ($request->has('associated_tags')) {
            $this->insertCrreAssociatedTags(
                $request->associated_tags,
                $insight->news_id,
                2,
                0,
                $lang
            );
        }

        return redirect($redirectUrl)
            ->with('success', 'Content ' . $request->insights_type . ' Saved Successfully.');
    }

    public function listContent(Request $request, $lang)
    {

        $model = ($lang === 'en') ? CrreContentList::class : CrreHindiContentList::class;
        $catModel = ($lang === 'en') ? CrreCategory::class : CrreHindiCategory::class;
        $authorModel = CrreAuthors::class;
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
            $data = $query->with('category')->orderByDesc('news_id')->paginate(100)->items();

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
        $Authors = CrreAuthors::select('author_id', 'title')
            ->where('status', 'A')
            ->get();
        $data = $query->orderByDesc('news_id')
            ->paginate(25)
            ->appends(['search' => $search, 'type' => $type, 'category' => $ctgry, 'author' => $authorFilter]);
        // dd($data);
        return view('crreAdmin.insights.list', compact(
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

    public function editContent($lang, $id)
    {
        // Dynamically assign models based on language
        $seoModel           = $lang === 'en' ? CrreSeotags::class : CrreSeotagshindi::class;
        $insightModel       = $lang === 'en' ? CrreContentList::class : CrreHindiContentList::class;
        $catModel           = $lang === 'en' ? CrreCategory::class : CrreHindiCategory::class;
        $subCatModel        = $lang === 'en' ? CrreSubCategory::class : CrreHindiSubCategory::class;
        $contentAssignModel = $lang === 'en' ? CrreContentAssignedTags::class : CrreContentAssignedTagsHindi::class;

        // Kickers
        $tags = $seoModel::query()->orderBy('tag_id', 'ASC')->pluck('name')->toArray();

        // Insight data
        $data = $insightModel::query()->with('author')->findOrFail($id);

        // Categories and Subcategories
        $InsightCategory    = $catModel::query()->where('status', '1')->get();
        $InsightSubcategory = $subCatModel::query()->where('mcat_id', $data->cat_id)->get();

        // Related Brands
        $brands = explode(",", $data->related_brand ?? '');
        // Authenticated user
        $user  = Auth::guard('crreAdmin')->user();
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
        $view = 'crreAdmin.insights.edit';

        return view($view, compact(
            'tags',
            'data',
            'assocTags',
            'authorData',   // role-based authors
            'role',         // current user role
            'InsightCategory',
            'brands',
            'InsightSubcategory',
            'lang'
        ));
    }

    public function updateContent(Request $request, $lang)
    {
        // dd($request->all());
        // Validate request
        $request->validate([
            'insights_publisher' => 'required',
            'insights_type'      => 'required',
            'insights_cat'       => 'required',
            'title'              => 'required|max:255',
            'sub_title'          => 'required',
            'content'            => 'required',
        ]);

        $role            = $request->session()->get('role', 'fi');
        $title           = $request->title;
        $subTitle        = $request->sub_title;
        $desc            = $request->input('content');
        $insight_type    = $request->insights_type;
        $cat_id          = $request->insights_cat;
        $subcat_id       = $request->insights_subcat;
        $alt             = $request->img_alt;
        $published_date  = $request->published_date;

        // Slug Handling
        if (!empty($request->slug)) {
            $slug = $lang === 'en' ? Str::slug($request->slug) : $request->slug;
        } else {
            $slug = Str::slug($title);
        }

        // Image Upload + Thumbnail
        $imageUrl = $request->old_image;
        $adminController = new \App\Http\Controllers\Admin\AdminController();
        if ($request->hasFile('image')) {
            $newsImage = $request->file('image');
            $imageUrl  = $adminController->uploadImage($newsImage, $insight_type, 0, 's3', '');
            $adminController->thumbnailCreation($imageUrl, $insight_type, 247, 139);
        }

        // Common Update Array
        $update = [
            'title'          => $title,
            'news_type'      => $role,
            'shortDesc'      => $subTitle,
            'content'        => $desc,
            'insight_type'   => $insight_type,
            'cat_id'         => $cat_id,
            'subcat_id'      => $subcat_id,
            'slug'           => $slug,
            'updated_by'     => Auth::guard('crreAdmin')->user()->admin_email,
            'author_id'      => $request->insights_publisher,
            'img_alt'        => $alt,
            'published_date' => $published_date,
        ];

        if ($request->hasFile('image')) {
            $update['image'] = $imageUrl;
        }

        // Choose Model Dynamically
        $model = $lang === 'en' ? CrreContentList::class : CrreHindiContentList::class;
        $model::query()->where('news_id', $request->news_id)->update($update);

        if (!empty($request->associated_tags)) {
            $this->insertCrreAssociatedTags($request->associated_tags, $request->news_id, 2, 1, $lang);
        }

        // Redirect
        return redirect()->route('crreAdmin.content.list', ['lang' => $lang])
            ->with('success', "Insights " . $insight_type . " Updated Successfully.");
    }

    public function deleteContent(Request $request, $lang)
    {
        $insightId    = $request->insightId;
        $insightType = $request->insightType;
        $model = ($lang === 'en') ? CrreContentList::class : CrreHindiContentList::class;
        $data = $model::find($insightId);
        if (!$data) {
            return response()->json(['error' => 'Insight not found.'], 404);
        }
        $model::query()->where('news_id', $insightId)->where('insight_type', $insightType)->delete();

        return redirect()->route('crreAdmin.content.list', ['lang' => $lang])->with('success', $insightType . ' Deleted Successfully.');
    }

    public function status(Request $request, $lang)
    {
        $newsId    = $request->id;
        $status    = $request->status;
        $model = ($lang === 'en') ? CrreContentList::class : CrreHindiContentList::class;
        $model::query()->where('news_id', $newsId)->update(['status' => $status]);

        return response()->json(['success' => 'Status updated successfully.', 'status' => $status]);
    }

    public function ContentRecords(Request $request, $lang)
    {
        $model = ($lang === 'en') ? CrreContentList::class : CrreHindiContentList::class;
        $catModel = ($lang === 'en') ? CrreCategory::class : CrreHindiCategory::class;

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

        $InsightAuthor = CrreAuthors::select('author_id', 'title', 'slug')
            ->where('status', 'A')
            ->get();

        // Return the view with data
        return view('crreAdmin.insights.quick-edit', compact(
            'data',
            'InsightCategory',
            'categoryName',
            'InsightAuthor',
            'totalRecords',
            'insightTypes',
            'lang'
        ));
    }

    public function saveMultipleContent(Request $request, $lang)
    {
        // Determine the model based on language segment
        $model = ($lang == 'en') ? CrreContentList::class : CrreHindiContentList::class;
        $catmodel = ($lang == 'en') ? CrreCategory::class : CrreHindiCategory::class;
        $subCatModel = ($lang == 'en') ? CrreSubCategory::class : CrreHindiSubCategory::class;
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
                    $this->insertCrreAssociatedTags($associatedTags, $newsId, 2, 0, $lang);
                }
            }
        }

        return redirect()->back()->with('success', 'Selected Records have been updated successfully!');
    }


    public function monthlyStats(Request $request)
    {
        if ($request->filled(['from_date', 'to_date'])) {
            $startDate = Carbon::parse($request->from_date)->startOfDay();
            $endDate = Carbon::parse($request->to_date)->endOfDay();

            // 1. English Insights Count
            $englishQuery = CrreContentList::select(
                'insight_type',
                DB::raw("
                CASE 
                    WHEN published_date IS NULL THEN created_at
                    WHEN published_date = created_at THEN created_at
                    WHEN published_date > created_at THEN published_date
                    ELSE created_at
                END AS effective_date
            ")
            )->where('status', 1);

            $englishBase = $englishQuery->toBase();

            $englishCounts = DB::table(DB::raw("({$englishBase->toSql()}) as subquery"))
                ->mergeBindings($englishBase)
                ->whereBetween('effective_date', [$startDate, $endDate])
                ->selectRaw("
                COUNT(CASE WHEN insight_type = 'Article' THEN 0 END) AS article_count,
                COUNT(CASE WHEN insight_type = 'News' THEN 0 END) AS news_count,
                COUNT(CASE WHEN insight_type = 'Interview' THEN 0 END) AS interview_count,
                COUNT(CASE WHEN insight_type = 'Report' THEN 0 END) AS report_count,
                COUNT(CASE WHEN insight_type NOT IN ('Article', 'News', 'Interview', 'Report') THEN 0 END) AS others_count
            ")
                ->first();

            // 2. Hindi Insights Count
            $hindiQuery = CrreHindiContentList::select(
                'insight_type',
                DB::raw("
                CASE 
                    WHEN published_date IS NULL THEN created_at
                    WHEN published_date = created_at THEN created_at
                    WHEN published_date > created_at THEN published_date
                    ELSE created_at
                END AS effective_date
            ")
            )->where('status', 1);

            $hindiBase = $hindiQuery->toBase();

            $hindiCounts = DB::table(DB::raw("({$hindiBase->toSql()}) as subquery"))
                ->mergeBindings($hindiBase)
                ->whereBetween('effective_date', [$startDate, $endDate])
                ->selectRaw("
                COUNT(CASE WHEN insight_type = 'Article' THEN 0 END) AS article_count,
                COUNT(CASE WHEN insight_type = 'News' THEN 0 END) AS news_count,
                COUNT(CASE WHEN insight_type = 'Interview' THEN 0 END) AS interview_count,
                COUNT(CASE WHEN insight_type = 'Report' THEN 0 END) AS report_count,
                COUNT(CASE WHEN insight_type NOT IN ('Article', 'News', 'Interview', 'Report') THEN 0 END) AS others_count
            ")
                ->first();

            return view('crreAdmin.search.insights_stats', [
                'from_date' => $startDate,
                'to_date' => $endDate,
                'englishCounts' => $englishCounts,
                'hindiCounts' => $hindiCounts,
            ]);
        }
        return view('crreAdmin.search.insights_stats');
    }

    protected function insertCrreAssociatedTags($tags, $id, $type, $isDelete, $isHindi)
    {
        //deleting and reinserting tags
        // dd($isHindi);
        if ($isHindi == 'en') {
            if ($isDelete == 1)
                CrreContentAssignedTags::query()->where('content_id', $id)->where('content_type', $type)->delete();
            foreach ($tags as $associatedTagsNew) {
                // Check if the tag already exists
                $exists = CrreContentAssignedTags::query()
                    ->where('content_id', $id)
                    ->where('content_type', $type)
                    ->where('tag_id', $associatedTagsNew)
                    ->first();
                if (!$exists) {
                    // Insert new tag only if it doesn't exist
                    CrreContentAssignedTags::query()->insert([
                        'content_type' => $type,
                        'content_id' => $id,
                        'tag_id' => $associatedTagsNew
                    ]);

                    //increasing frequency count
                    CrreSeotags::query()->where('tag_id', $associatedTagsNew)->increment('frequency');
                }
            }
        } elseif ($isHindi == 'hi') {
            if ($isDelete == 1)
                CrreContentAssignedTagsHindi::query()->where('content_id', $id)->where('content_type', $type)->delete();
            // dd($tags);
            foreach ($tags as $associatedTagsNew) {
                $exists = CrreContentAssignedTagsHindi::query()
                    ->where('content_id', $id)
                    ->where('content_type', $type)
                    ->where('tag_id', $associatedTagsNew)
                    ->first();
                // dd($exists);
                if (!$exists) {
                    // Insert new tag only if it doesn't exist
                    CrreContentAssignedTagsHindi::query()->insert([
                        'content_type' => $type,
                        'content_id' => $id,
                        'tag_id' => $associatedTagsNew
                    ]);

                    //increasing frequency count
                    CrreSeotagshindi::query()->where('tag_id', $associatedTagsNew)->increment('frequency');
                }
            }
        }
    }
}
