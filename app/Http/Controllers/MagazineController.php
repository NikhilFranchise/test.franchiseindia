<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MagazineList;
use App\Models\MagazineComment;
use App\Models\MagazineCategorie;

class MagazineController extends Controller
{
    //
       /**
     * @return mixed
     */
    public function magazineListHome()
    {
        $articleController = new ArticleController();
        $brandController   = new BrandController();
        $magazineCategory  = MagazineCategorie::query()->select('category_id','title','iss_month','iss_year','image', 'magz_id')
            ->where('status', 1)
            ->where('image', '!=', '')
            ->where('iss_year', '!=', '')
            ->orderBy('category_id','desc')
            ->paginate(8);
        $i=0;
        while($i < count($magazineCategory)) {
            $magFetchId    = $magazineCategory[$i]->category_id;
            $magFetchField = 'category_id';

            if (!empty($magazineCategory[$i]->magz_id)) {
                $magFetchId    = $magazineCategory[$i]->magz_id;
                $magFetchField = 'id';
            }

            $magazineList[] = MagazineList::query()->select('item_id', 'id', 'category_id', 'title', 'author', 'image', 'subtitle', 'slug', 'time')
                ->where($magFetchField, $magFetchId)
                ->where('status',1)
                ->orderBy('item_id','desc')
                ->take(4)->get();
            $i++;
        }

        $newsArticles   = $articleController->getNews(4);
        $videoArticles   = $articleController->getvideoArticle(9);
        $relatedBrands = $brandController->getRandomBrands(6);

       // return view('article/magazine/magazinearticlelist')->with(compact('videoArticles','newsArticles','magazineList', 'magazineCategory','relatedBrands'));
	   return view('article/magazine/magazinearticlelistnew')->with(compact('videoArticles','newsArticles','magazineList', 'magazineCategory','relatedBrands'));
    }

    /**
     * @return mixed
     */
    public function magazineList()
    {
        $contentId    = request()->id;
        $magYear      = request()->pyear;
        $articles     = MagazineCategorie::query()->where('category_id', $contentId)->where('iss_year', $magYear)->get();

        //return count($articles);
        if (count($articles) == 0)
            $articles     = MagazineCategorie::query()->where('magz_id', $contentId)->where('iss_year', $magYear)->get();

        if (count($articles) == 0)
            return redirect('pagenotfound');

        $year  = $articles[0]['iss_year'];

        $magFetchId    = $articles[0]['category_id'];
        $magFetchField = 'category_id';

        if (!empty($articles[0]['magz_id'])) {
            $magFetchId    = $articles[0]['magz_id'];
            $magFetchField = 'id';
        }

        $monthNum  = sprintf("%02d", $articles[0]['iss_month']);
        $month     = date('F', mktime(0, 0, 0, $monthNum, 10));

        $mgznArticles = MagazineList::query()->where($magFetchField, $magFetchId)->get()->toArray();

        $i = 0;
        while ($i < count($mgznArticles)) {
            $mgznArticles[$i]['urlTitle']  = CommonController::cleanSpecialChar($mgznArticles[$i]['title']);
            $i++;
        }
        $articleController = new ArticleController();
        $brandController = new BrandController();
        $newsArticles   = $articleController->getNews(4);
        $videoArticles   = $articleController->getvideoArticle(9);
        $relatedBrands = $brandController->getRandomBrands(6);

        return view('article/magazine/magazinearticlelist2')->with(compact('articles','mgznArticles','videoArticles', 'newsArticles','relatedBrands','year','month','contentId'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function magazineListInner(Request $request)
    {
        $month             = $request->month;
        $year              = $request->year;
        $itemId            = $request->id;
        $articleController = new ArticleController();

        $article = MagazineList::query()->where('item_id',$itemId)->first();

        if (empty($article) || $article->status != 1)
            return redirect('magazine');

        $contentId = $article->category_id;


        $likeArticles  = $articleController->likeArticlesArticleInner(19, 0);
        $newsArticles  = $articleController->getNews(4);
        $videoArticles = $articleController->getvideoArticle(9);


        return view('article/magazine/magazinearticleinner')->with(compact('videoArticles', 'newsArticles', 'article','month','year', 'contentId','likeArticles'));
    }

    /**
     * Function for comments
     * @param Request $request
     * @return mixed
     */
    public function commentForm(Request $request)
    {
        $this->validate($request, array(
            'name'    => 'required|max:32',
            'email'   => 'required|email|max:255',
            'comment' => 'required|min:5|max:1000',
            'conid'     => 'required',
            'opt'     => 'required'));

        $contId   = $request->conid;
        $name     = $request->name;
        $email    = $request->email;
        $cmnt     = $request->comment;
        $opt      = $request->opt;

        $comments = MagazineComment::query()->insert([
            'comment_user' => $name,
            'comment_email' => $email,
            'comment_content' => $cmnt,
            'rating' => $opt,
            'mobile' => $request->mobile,
            'magzID' => $contId
        ]);

        if (!$comments)
            return '0';

        return '1';
    }

    /**
     * @param $count
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getMagazineCategoryArticleHome($count)
    {
        return MagazineCategorie::query()->select('category_id', 'title', 'iss_month', 'iss_year', 'image')
            ->where('status', 1)
            ->where('image', '!=', '')
            ->orderBy('category_id', 'desc')
            ->take($count)->get();
    }

    /**
     * @param $count
     * @param $id
     * @return array
     */
    public function getMagazineArticleHome($count, $id)
    {
        $magazine =  MagazineList::query()->select('item_id', 'category_id', 'title', 'author', 'subtitle')
            ->where('category_id', $id)
            ->where('status', 1)
            ->orderBy('item_id', 'desc')
            ->take($count)->get()->toArray();

        $i = 0;
        while ($i < count($magazine)) {
            $magazine[$i]['urlTitle'] = CommonController::cleanSpecialChar($magazine[$i]['title']);
            $i++;
        }

        return $magazine;
    }
}
