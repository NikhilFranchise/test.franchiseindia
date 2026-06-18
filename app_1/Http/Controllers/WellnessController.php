<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WiPoll;
use App\Models\SeoTag;
use App\Models\WiPollAnswer;
use App\Models\SitePageBrand;
use App\Models\ContentTagsAssigned;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Cookie;
class WellnessController extends Controller
{
    //
      /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleWellness()
    {
        $ArticleController = new ArticleController;
        $tagIdArr          = [];
        $contentIdArr      = [];
        $wellnessArticles  = $ArticleController->siteHomeArticles('wi', 13, "", "");

        $tagId             = SeoTag::query()->select('tag_id')
                                    ->where('name', 'VM & DESIGN')
                                    ->orWhere('name','Vm and Design')
                                    ->orWhere('name', 'VM Design')
                                    ->get();
        if(!empty($tagId)) {
            $tagId         = $tagId->toArray();
            $tagIdArr      = array_column($tagId, 'tag_id');
        }

        $contentId         = ContentTagsAssigned::query()->select('content_id')
                                                ->whereIn('tag_id', $tagIdArr)
                                                ->where('content_type',1)
                                                ->get();

        if(!empty($contentId)) {
            $contentId     = $contentId->toArray();
            $contentIdArr  = array_column($contentId, 'content_id');
        }

        $vmArticles        = $ArticleController->siteHomeArticles('wi', 18, $contentIdArr, "");
        $tagId             = SeoTag::query()->select('tag_id')->where('name', 'Wellness')->get();
        $tagIdArr          = [];
        if(!empty($tagId)) {
            $tagId           = $tagId->toArray();
            $tagIdArr        = array_column($tagId, 'tag_id');
        }

        $contentId         = ContentTagsAssigned::query()->select('content_id')->whereIn('tag_id', $tagIdArr)->where('content_type',1)->get()->toArray();
        $contentIdArr      = array_column($contentId, 'content_id');

        //Industry Articles
        $indusArticles     = $ArticleController->siteHomeArticles('wi', 18, $contentIdArr, "");

        //Product launch Articles
        $brandArticles     = $ArticleController->siteHomeArticles('wi', 9, "", "Product Launch");

        //Beauty Articles
        $beautyArticles    = $ArticleController->siteHomeArticles('wi', 7, "", "Beauty & Wellness");

        //investment Articles
        $businessArticles  = $ArticleController->siteHomeArticles('wi', 9, "", "INVESTMENT");

        //Technical Articles
        $techArticles      = $ArticleController->siteHomeArticles('wi', 9, "", "TECH DIGITAL");
        
        //Wellness Articles
        $wellArticles      = $ArticleController->siteHomeArticles('wi', 9, "", "WELLNESS BLOG");

        //Health Articles
        $healthArticles    = $ArticleController->siteHomeArticles('wi', 9, "", "HealthCare");

        //for Videos
        $videoArticles     = $ArticleController->getvideoArticle(9);

        //for News
        $newsArticles      = $ArticleController->getNews(4);
        $tags              = $ArticleController->wellnessTagsArticles();
        $pollQuestion      = WiPoll::query()->select('pollID','pollQuestion')->where('pollStatus',1)->first();
        $pollAnswers       = WiPollAnswer::query()->select('pollAnswerID','pollAnswervalue')->where('pollID', $pollQuestion->pollID)->get();
        $franIds           = SitePageBrand::query()->select('fihl_id')->where('status', 1)->where('page_type',2)->get();

        if(!empty($franIds))
            $franIds = $franIds->pluck('fihl_id');

        $bannerData        = FranchisorBusinessDetail::query()->whereIn('franchisor_id', $franIds)->get();

        return view('article/wellness/wellnesshome', compact('wellnessArticles','vmArticles','indusArticles', 'brandArticles', 'beautyArticles','businessArticles','techArticles', 'wellArticles','healthArticles','newsArticles', 'videoArticles','tags','pollQuestion','pollAnswers', 'bannerData'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function vote()
    {
        $value = request()->poll;
        $points = 0;
        if (Cookie::get('wellnessPoll') !== null)
            return "voted";
        else {
            $answerPoint = WiPollAnswer::query()->select('pollAnswerPoints', 'pollID')
                                            ->where('pollAnswerValue', $value)
                                            ->first();

            WiPollAnswer::query()->where('pollAnswerValue', $value)
                            ->update(['pollAnswerPoints' => $answerPoint->pollAnswerPoints + 1]);

            $totalPoints = WiPollAnswer::query()->select('pollAnswerPoints')
                ->where('pollID', $answerPoint->pollID)->get();

            $i = 0;
            while ($i < count($totalPoints)) {
                $points += $totalPoints[$i]['pollAnswerPoints'];
                $i++;
            }

            $percent1 = round((($totalPoints[0]['pollAnswerPoints'] * 100) / $points), 3);
            $percent2 = round((($totalPoints[1]['pollAnswerPoints'] * 100) / $points), 3);
            $percent3 = round((($totalPoints[2]['pollAnswerPoints'] * 100) / $points), 3);
            $percent4 = round((($totalPoints[3]['pollAnswerPoints'] * 100) / $points), 3);

            $expire   = time() + 60 * 60 * 24 * 30;
            Cookie::getFacadeRoot()->queue('wellnessPoll', 'wellnessPoll', $expire);

            return response()->json(array
                                        (
                                            "point1" => $percent1,
                                            "point2" => $percent2,
                                            "point3" => $percent3,
                                            "point4" => $percent4,
                                            "point5" => "<div class=\"progress\"><div class=\"progress-bar red\" role=\"progressbar\" aria-valuenow=$percent1 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent1%\"></div></div>",
                                            "point6" => "<div class=\"progress\"><div class=\"progress-bar green\" role=\"progressbar\" aria-valuenow=$percent2 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent2%\"> </div> </div>",
                                            "point7" => "<div class=\"progress\"><div class=\"progress-bar yellow\" role=\"progressbar\" aria-valuenow=$percent3 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent3%\"> </div> </div>",
                                            "point8" => "<div class=\"progress\"><div class=\"progress-bar blue\" role=\"progressbar\" aria-valuenow=$percent4 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent4%\"> </div> </div>",
                                        ),200);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewResult()
    {
        $questionId = WiPoll::query()->select('pollID')->where('pollStatus',1)->first();
        $answers    = WiPollAnswer::query()->select('pollAnswerPoints')
                                    ->where('pollID', $questionId->pollID)->get();

        $i      = 0;
        $points = 0;
        while ($i < count($answers)) {
            $points += $answers[$i]['pollAnswerPoints'];
            $i++;
        }

        $percent1 = round((($answers[0]['pollAnswerPoints'] * 100) / $points), 3);
        $percent2 = round((($answers[1]['pollAnswerPoints'] * 100) / $points), 3);
        $percent3 = round((($answers[2]['pollAnswerPoints'] * 100) / $points), 3);
        $percent4 = round((($answers[3]['pollAnswerPoints'] * 100) / $points), 3);

        return response()->json(array 
                                      (
                                        "point1" => $percent1,
                                        "point2" => $percent2,
                                        "point3" => $percent3,
                                        "point4" => $percent4,
                                        "point5" => "<div class=\"progress\"><div class=\"progress-bar red\" role=\"progressbar\" aria-valuenow=$percent1 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent1%\"></div></div>",
                                        "point6" => "<div class=\"progress\"><div class=\"progress-bar green\" role=\"progressbar\" aria-valuenow=$percent2 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent2%\"> </div> </div>",
                                        "point7" => "<div class=\"progress\"><div class=\"progress-bar yellow\" role=\"progressbar\" aria-valuenow=$percent3 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent3%\"> </div> </div>",
                                        "point8" => "<div class=\"progress\"><div class=\"progress-bar blue\" role=\"progressbar\" aria-valuenow=$percent4 aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$percent4%\"> </div> </div>",
                                    ),200);
    }
}
