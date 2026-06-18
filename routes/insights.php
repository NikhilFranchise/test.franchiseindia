<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\InsightsController;
use App\Http\Controllers\InsightSitemapController;
use App\Http\Middleware\Setlocale;
use App\Http\Middleware\TrailingSlashRedirect;
/*
|--------------------------------------------------------------------------
| GLOBAL SITEMAP & RSS (NO LOCALE)
|--------------------------------------------------------------------------
*/

Route::get('sitemap',                       [InsightSitemapController::class, 'sitemap']);
Route::get('sitemap/today',                 [InsightSitemapController::class, 'todaysitemap']);
Route::get('sitemap/yesterday',             [InsightSitemapController::class, 'yesterdaysitemap']);
Route::get('sitemap/thisweek',              [InsightSitemapController::class, 'thisweeksitemap']);
Route::get('sitemap/lastweek',              [InsightSitemapController::class, 'lastweeksitemap']);
Route::get('sitemap/{year}',                [InsightSitemapController::class, 'monthsitemap']);
Route::get('sitemap/{year}/{month}',        [InsightSitemapController::class, 'daysitemap']);
Route::get('sitemap/{year}/{month}/{day}',  [InsightSitemapController::class, 'datesitemap']);

Route::get('rss',               [InsightSitemapController::class, 'rssFeed']);
Route::get('author/{slug}/rss', [InsightSitemapController::class, 'generateAuthorRssFeed']);

/*
|--------------------------------------------------------------------------
| NEXT / PREVIOUS ARTICLE (LANG PARAM, NOT LOCALE GROUP)
|--------------------------------------------------------------------------
*/
Route::middleware(TrailingSlashRedirect::class)->group(function () {

    Route::get('{lang}/next-article', [InsightsController::class, 'nextArticle'])
        ->name('insights.nextArticle')->where('lang', 'en|hi');
    // For previous article (this was incorrect in your code)
    Route::get('{lang}/prev-article', [InsightsController::class, 'prevArticle'])
        ->name('insights.prevArticle')->where('lang', 'en|hi');
    Route::get('author',        [InsightsController::class, 'authorarchive']);
    Route::get('author/{slug}', [InsightsController::class, 'authordata']);

    /*
|--------------------------------------------------------------------------
| LOCALE BASED ROUTES (en | hi)
|--------------------------------------------------------------------------
*/
    Route::get('/{locale?}', [InsightsController::class, 'insightshome'])
        ->where('locale', 'en|hindi')
        ->middleware(setLocale::class)
        ->name('insights.insightshome');
    Route::get('thanks',       fn() => view('insights.thanks'));
    Route::get('pagenotfound', fn() => view('insights.404'));
    Route::group([
        'prefix'     => '{locale}',
        'where'      => ['locale' => 'en|hi'],
        'middleware' => 'setLocale'
    ], function () {

        /*
    |--------------------------------------------------------------------------
    | LOCALE SITEMAPS & RSS
    |--------------------------------------------------------------------------
    */
        Route::get('sitemap.xml', function () {
            return response()
                ->view('insights.sitemaps.sitemap')
                ->header('Content-Type', 'text/xml');
        });

        Route::get('news.xml',          [InsightSitemapController::class, 'newssitemap']);
        Route::get('googlenews.xml',    [InsightSitemapController::class, 'googleNewsSitemap']);
        Route::get('article.xml',       [InsightSitemapController::class, 'articlesitemap']);
        Route::get('article2.xml',      [InsightSitemapController::class, 'articlesitemaptwo']);
        Route::get('interview.xml',     [InsightSitemapController::class, 'interviewsitemap']);
        Route::get('event.xml',         [InsightSitemapController::class, 'eventsitemap']);
        Route::get('report.xml',        [InsightSitemapController::class, 'reportsitemap']);
        Route::get('categories.xml',    [InsightSitemapController::class, 'categorysitemap']);
        Route::get('subcategories.xml', [InsightSitemapController::class, 'subcategorysitemap']);
        Route::get('tags.xml',          [InsightSitemapController::class, 'tagsitemap']);

        Route::get('tag/{tagslug}/rss',  [InsightSitemapController::class, 'generateTagRssFeed']);
        Route::get('topstories/rss',     [InsightSitemapController::class, 'generateRssFeed']);
        Route::get('industryfocus/rss',  [InsightSitemapController::class, 'generateRssFeed']);
        Route::get('interviews/rss',     [InsightSitemapController::class, 'generateRssFeed']);
        Route::get('events_reports/rss', [InsightSitemapController::class, 'generateRssFeed']);
        Route::get('{slug}/rss',         [InsightSitemapController::class, 'generateCatRssFeed']);
        Route::get('{cat}/{subcat}/rss', [InsightSitemapController::class, 'generateSubCatRssFeed']);

        /*
    |--------------------------------------------------------------------------
    | CATEGORY REDIRECTS (WERE IN en/hi)
    |--------------------------------------------------------------------------
    */
        $categories = ['msme', 'electric-vehicles', 'education'];

        foreach ($categories as $slug) {
            Route::get($slug, function (Request $request, $locale) use ($slug) {
                $baseUrl = "https://www.entrepreneurindia.com/blog/{$locale}/{$slug}";
                $query   = $request->getQueryString();

                return redirect()->away(
                    $query ? $baseUrl . '?' . $query : $baseUrl,
                    301
                );
            });
        }

        /*
    |--------------------------------------------------------------------------
    | LEGACY REDIRECTS (WERE en ONLY → NOW LOCALE SAFE)
    |--------------------------------------------------------------------------
    */
        Route::get('{insight_type}/{slug}.{id}', function ($locale, $insight_type, $slug, $id) {
            return redirect("/insights/{$locale}/{$insight_type}/{$slug}.{$id}", 301);
        });

        Route::get('tag/{tagslug}', function ($locale, $tagslug) {
            return redirect("/insights/{$locale}/tag/{$tagslug}", 301);
        });

        /*
    |--------------------------------------------------------------------------
    | ACTUAL FRONTEND PAGES
    |--------------------------------------------------------------------------
    */


        Route::post('instasubsribe',    [InsightsController::class, 'instasubsribe']);
        Route::post('newslettersignup', [InsightsController::class, 'newslettersignup']);
        Route::get('export',       [InsightsController::class, 'exportInsights']);
        Route::get('search',         [InsightsController::class, 'insightSearch']);
        Route::get('topstories',     [InsightsController::class, 'getinsightstories']);
        Route::get('interviews',     [InsightsController::class, 'getinsightsinterviews']);
        Route::get('events_reports', [InsightsController::class, 'geteventsreports']);
        Route::get('industryfocus',  [InsightsController::class, 'industryfocus']);
        Route::get('video_podcast',  [InsightsController::class, 'getvideopodcast']);
        Route::get('podcast',        [InsightsController::class, 'getpodcast']);
        Route::get('tag/{tagslug}',  [InsightsController::class, 'insightstags']);

        Route::get('{insight_type}/{slug}.{id}', [InsightsController::class, 'getInsightsDetails'])->name('insights.view');
        Route::get('{category}/{subcategory}',   [InsightsController::class, 'insightsubcategory']);
        Route::get('{slug}',                     [InsightsController::class, 'insightscategorydata']);
    });
});