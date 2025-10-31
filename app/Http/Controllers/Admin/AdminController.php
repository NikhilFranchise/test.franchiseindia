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
use App\Models\FranchisorBusinessDetail;
use App\Models\ArticleInterviewCommentReply;
use App\Models\FihlPodcastVideo;
use App\Models\FihlVideoCategory;
use App\Mail\CommentReplyMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('ContentAdmin')->except('loginView', 'loginCheck', 'relatedBrands');
    }

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

    /**
     * @return mixed
     */
    public function deleteKicker()
    {
        $class   = (request()->type == 'hindi') ? (SeoTagHindi::query()) : (SeoTag::query());
        return $class->where('tag_id', request()->tag_id)->delete();
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

    // public function uploadImage($image, $type, $isDelete, $store_type, $oldImagePath)
    // {
    //     $uploadPath = "uploads/";

    //     // Delete old image if needed
    //     if ($isDelete == 1 && $store_type == 'public' && !empty($oldImagePath)) {
    //         unlink(public_path($oldImagePath));
    //     }

    //     if ($isDelete == 1 && $store_type == 's3') {
    //         Storage::getFacadeRoot()->disk('s3')->delete(parse_url($oldImagePath)['path']);
    //     }

    //     // Define the upload path based on the type
    //     $extension = 'webp'; // Saving images in webp format
    //     $picPath = config('constants.AdminArticleInterview') . '/' . session()->get('role') . '/art/' . uniqid() . '.' . $extension;

    //     switch ($type) {
    //         case 'Author':
    //             $picPath = $uploadPath . sprintf(config('constants.AdminAuthor'), date('md')) . '/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Article':
    //             $picPath = $uploadPath . config('constants.AdminArticleInterview') . '/' . session()->get('role') . '/art/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Interview':
    //             $picPath = $uploadPath . config('constants.AdminArticleInterview') . '/' . session()->get('role') . '/int/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Gallery':
    //             $picPath = config('constants.AdminArticleInterview') . '/gallery/art/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Magazine':
    //             $picPath = $uploadPath . config('constants.AdminMagazine') . '/' . '' . uniqid() . '.' . $extension;
    //             break;
    //         case 'News':
    //             $picPath = $uploadPath . config('constants.AdminNews') . '/' . session()->get('role') . '/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Report':
    //             $picPath = $uploadPath . config('constants.AdminNews') . '/' . session()->get('role') . '/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Event':
    //             $picPath = $uploadPath . config('constants.AdminNews') . '/' . session()->get('role') . '/' . uniqid() . '.' . $extension;
    //             break;
    //         case 'Terms':
    //             $picPath = $uploadPath . config('constants.AdminNews') . '/' . session()->get('role') . '/' . uniqid() . '.' . $extension;
    //             break;
    //     }

    //     if ($type != 'Author' && $type  != 'Gallery' && $type  != 'Magazine') {
    //         $resizedImage = Image::make($image)->resize(1600, 940)->encode('webp', 90);
    //     } else if ($type == 'Author') {
    //         $resizedImage = Image::make($image)->resize(512, 512)->encode('webp', 90);
    //     } else {
    //         $resizedImage = Image::make($image)->encode('webp', 90);
    //     }
    //     // Store the image in the specified storage
    //     Storage::getFacadeRoot()->disk($store_type)->put($picPath, (string) $resizedImage, 'public');
    //     $imageUrl = Storage::getFacadeRoot()->disk($store_type)->url($picPath);

    //     // Return the correct image URL
    //     if ($store_type == 's3' && $type != 'Gallery') {
    //         return str_replace('storage', 'uploads', parse_url($imageUrl, PHP_URL_PATH));
    //     }

    //     return str_replace('storage', 'uploads', $imageUrl);
    // }
    public function uploadImage($image, $type, $isDelete = 0, $storeType = 'public', $oldImagePath = null)
    {
        try {
            $uploadPath = "uploads/";
            $extension  = 'webp'; // always convert to webp
            $role       = session()->get('role', 'fi');
            $fileName   = uniqid() . '.' . $extension;

            // ---------------------------
            // 1. Handle old image deletion
            // ---------------------------
            if ($isDelete && $oldImagePath) {
                if ($storeType === 'public') {
                    @unlink(public_path($oldImagePath));
                } elseif ($storeType === 's3') {
                    Storage::disk('s3')->delete(parse_url($oldImagePath, PHP_URL_PATH));
                }
            }

            // ---------------------------
            // 2. Build storage path
            // ---------------------------
            $typePaths = [
                'Author'    => "{$uploadPath}" . config('constants.AdminAuthor') . '/' . date('md'),
                'Article'   => "{$uploadPath}" . config('constants.AdminArticleInterview') . "/{$role}/art",
                'Interview' => "{$uploadPath}" . config('constants.AdminArticleInterview') . "/{$role}/int",
                'Gallery'   => config('constants.AdminArticleInterview') . "/gallery/art",
                'Magazine'  => "{$uploadPath}" . config('constants.AdminMagazine'),
                'News'      => "{$uploadPath}" . config('constants.AdminNews') . "/{$role}",
                'Report'    => "{$uploadPath}" . config('constants.AdminNews') . "/{$role}",
                'Event'     => "{$uploadPath}" . config('constants.AdminNews') . "/{$role}",
                'Terms'     => "{$uploadPath}" . config('constants.AdminNews') . "/{$role}",
            ];

            if (!isset($typePaths[$type])) {
                throw new \Exception("Invalid type provided: {$type}");
            }

            $picPath = $typePaths[$type] . '/' . $fileName;

            // ---------------------------
            // 3. Image resizing rules
            // ---------------------------
            switch ($type) {
                case 'Author':
                    $resizedImage = Image::make($image)
                        ->resize(512, 512, function ($c) {
                            $c->aspectRatio();
                            $c->upsize();
                        })
                        ->encode($extension, 90);
                    break;

                case 'Gallery':
                case 'Magazine':
                    $resizedImage = Image::make($image)->encode($extension, 90);
                    break;

                default: // Article, Interview, News, Report, Event, Terms
                    $resizedImage = Image::make($image)
                        ->resize(1600, 940, function ($c) {
                            $c->aspectRatio();
                            $c->upsize();
                        })
                        ->encode($extension, 90);
                    break;
            }
            // dd($resizedImage);
            // ---------------------------
            // 4. Store file
            // ---------------------------
            Storage::disk($storeType)->put($picPath, (string) $resizedImage, 'public');
            $imageUrl = Storage::disk($storeType)->url($picPath);

            // ---------------------------
            // 5. Return normalized URL
            // ---------------------------
            if ($storeType === 's3' && $type !== 'Gallery') {
                return str_replace('storage', 'uploads', parse_url($imageUrl, PHP_URL_PATH));
            }

            return str_replace('storage', 'uploads', $imageUrl);
        } catch (\Exception $e) {
            $this->setLog("Image upload error ({$type}): " . $e->getMessage());
            return false;
        }
    }



    /**
     * @param $imageUrl
     * @param $type
     * @param $height
     * @param $width
     */
    // public function thumbnailCreation($imageUrl, $type, $width, $height)
    // {
    //     //thumbnail creation
    //     // dd($imageUrl, $type, $width, $height);
    //     $sourcePhoto     = public_path($imageUrl);
    //     $locale = App::getLocale();
    //     // dd($locale);
    //     if ($type == 'Gallery') {
    //         $sourcePhoto = $imageUrl;
    //     } else if ($type == 'News' && $locale == 'en') {
    //         $sourcePhoto = Config('constants.franAwsS3Url') . $imageUrl;
    //     } else if ($type == 'News' && $locale == 'hi') {
    //         $sourcePhoto = Config('constants.awsS3Url') . $imageUrl;
    //     } else if ($type == 'Article' && $locale == 'en') {
    //         $sourcePhoto = Config('constants.franAwsS3Url') . $imageUrl;
    //     } else if ($type == 'Article' && $locale == 'hi') {
    //         $sourcePhoto = Config('constants.awsS3Url') . $imageUrl;
    //     }
    //     if ($type != 'Gallery')
    //         $sourcePhoto = Config('constants.awsS3Url') . $imageUrl;
    //     $imageName       = pathinfo($sourcePhoto)['basename'];
    //     // dd($sourcePhoto);

    //     $destinationPath = "uploads";

    //     switch ($type) {
    //         case 'Article':
    //             $destinationPath = public_path('uploads/thumbnails/article/' . session()->get('role') . '/art/');
    //             break;

    //         case 'Interview':
    //             $destinationPath = public_path('uploads/thumbnails/interview/' . session()->get('role') . '/int/');
    //             break;

    //         case 'Gallery':
    //             $destinationPath = public_path('uploads/thumbnails/ga');
    //             break;

    //         case 'News':
    //             $destinationPath = public_path('uploads/thumbnails/news/' . session()->get('role') . '/');
    //             // dd($destinationPath);
    //     }

    //     try {
    //         // dd($destinationPath);
    //         if (!file_exists($destinationPath)) {
    //             mkdir($destinationPath, 0777, true);
    //         }
    //         $image = Image::make($sourcePhoto)->resize($width, $height)->save($destinationPath . '/' . $imageName, 90);
    //         // dd($image);

    //     } catch (\Exception $e) {
    //         $this->setLog('Thumbnail creation error ' . $e->getMessage());
    //         die;
    //     }
    // }

    public function thumbnailCreation($imageUrl, $type, $width, $height)
    {
        try {
            $locale = App::getLocale();

            // ---------------------------
            // 1. Source photo resolution
            // ---------------------------
            $baseUrls = [
                'en' => config('constants.franAwsS3Url'),
                'hi' => config('constants.awsS3Url'),
            ];
            $imageUrl = ltrim($imageUrl, '/'); // Clean the image path


            switch ($type) {
                case 'Gallery':
                    $sourcePhoto = public_path($imageUrl);
                    break;

                case 'News':
                case 'Article':
                case 'Report': // ✅ Added Report
                    $sourcePhoto = $baseUrls[$locale] . $imageUrl;
                    break;

                case 'Interview':
                    $sourcePhoto = public_path($imageUrl); // Assuming Interview is uploaded locally
                    break;

                default:
                    throw new \Exception("Unknown type: {$type}");
            }
            // dd($sourcePhoto);
            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);

            // ---------------------------
            // 2. Destination path mapping
            // ---------------------------
            $role = session()->get('role', 'fi'); // fallback if no role
            $destinations = [
                'Article'   => "uploads/thumbnails/article/{$role}/art",
                'Interview' => "uploads/thumbnails/interview/{$role}/int",
                'Gallery'   => "uploads/thumbnails/gallery",
                'News'      => "uploads/thumbnails/news/{$role}",
                'Report'    => "uploads/thumbnails/report/{$role}", // ✅ Added Report
            ];

            if (!isset($destinations[$type])) {
                throw new \Exception("No destination defined for type: {$type}");
            }

            $destinationPath = public_path($destinations[$type]);
            // dd($destinationPath);
            // ---------------------------
            // 3. Ensure directory exists
            // ---------------------------
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // ---------------------------
            // 4. Generate and save thumbnail
            // ---------------------------
            Image::make($sourcePhoto)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio(); // keep proportions
                    $constraint->upsize();      // prevent stretching
                })
                ->save("{$destinationPath}/{$imageName}", 90);

            return "{$destinations[$type]}/{$imageName}"; // relative path

        } catch (\Exception $e) {
            $this->setLog('Thumbnail creation error: ' . $e->getMessage());
            return false;
        }
    }


    /**
     * @param $desc
     * @return null|string|string[]
     */
    public function cleanContent($desc)
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
    public function insertAssociatedTags($tags, $id, $type, $isDelete, $isHindi)
    {
        //deleting and reinserting tags
        // dd($isHindi);
        if ($isHindi == 'en') {
            if ($isDelete == 1)
                ContentTagsAssigned::query()->where('content_id', $id)->where('content_type', $type)->delete();
            foreach ($tags as $associatedTagsNew) {
                // Check if the tag already exists
                $exists = ContentTagsAssigned::query()
                    ->where('content_id', $id)
                    ->where('content_type', $type)
                    ->where('tag_id', $associatedTagsNew)
                    ->first();
                if (!$exists) {
                    // Insert new tag only if it doesn't exist
                    ContentTagsAssigned::query()->insert([
                        'content_type' => $type,
                        'content_id' => $id,
                        'tag_id' => $associatedTagsNew
                    ]);

                    //increasing frequency count
                    SeoTag::query()->where('tag_id', $associatedTagsNew)->increment('frequency');
                }
            }
        } elseif ($isHindi == 'hi') {
            if ($isDelete == 1)
                ContentTagsAssignedHindi::query()->where('content_id', $id)->where('content_type', $type)->delete();
            // dd($tags);
            foreach ($tags as $associatedTagsNew) {
                $exists = ContentTagsAssignedHindi::query()
                    ->where('content_id', $id)
                    ->where('content_type', $type)
                    ->where('tag_id', $associatedTagsNew)
                    ->first();
                // dd($exists);
                if (!$exists) {
                    // Insert new tag only if it doesn't exist
                    ContentTagsAssignedHindi::query()->insert([
                        'content_type' => $type,
                        'content_id' => $id,
                        'tag_id' => $associatedTagsNew
                    ]);

                    //increasing frequency count
                    SeoTagHindi::query()->where('tag_id', $associatedTagsNew)->increment('frequency');
                }
            }
        }
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
}
