<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crre\CrreController;
use App\Http\Controllers\Crre\CrreSitemapController;

Route::get('sitemap',                       [CrreSitemapController::class, 'sitemap']);
Route::get('sitemap/today',                 [CrreSitemapController::class, 'todaysitemap']);
Route::get('sitemap/yesterday',             [CrreSitemapController::class, 'yesterdaysitemap']);
Route::get('sitemap/thisweek',              [CrreSitemapController::class, 'thisweeksitemap']);
Route::get('sitemap/lastweek',              [CrreSitemapController::class, 'lastweeksitemap']);
Route::get('sitemap/{year}',                [CrreSitemapController::class, 'monthsitemap']);
Route::get('sitemap/{year}/{month}',        [CrreSitemapController::class, 'daysitemap']);
Route::get('sitemap/{year}/{month}/{day}',  [CrreSitemapController::class, 'datesitemap']);

// Rss Feed routes
Route::get('rss',                           [CrreSitemapController::class, 'rssFeed']);
Route::get('author/{slug}/rss',             [CrreSitemapController::class, 'generateAuthorRssFeed']);

Route::get('/{locale?}', [CrreController::class, 'homepage'])
    ->where('locale', 'en|hindi')
    ->middleware('setLocale')
    ->name('crre.homepage');

Route::get('pagenotfound', function () {
    return view('crre.404');
}); //404 ERROR PAGE
Route::get('thanks', function () {
    return view('crre.thanks');
})->name('crre.thanks');
Route::get('author/{slug}',                 [CrreController::class, 'authorRecord'])->name('crre.authorRecord');
Route::get('author',                        [CrreController::class, 'authors']);
Route::post('instasubsribe',                [CrreController::class, 'instasubsribe']);
Route::post('newslettersignup',             [CrreController::class, 'newslettersignup']);
// news routes
Route::group([
    'prefix' => '{locale}',
    'where'  => ['locale' => 'en|hi'],
    'middleware' => 'setLocale'
], function () {

    // STATIC ROUTES FIRST
    Route::get('/topstories', [CrreController::class, 'topStories'])->name('crre.topstories');
    Route::get('/toparticles', [CrreController::class, 'topArticles'])->name('crre.toparticles');
    Route::get('/interviews', [CrreController::class, 'topInterviews'])->name('crre.topinterviews');
    Route::get('/events_reports', [CrreController::class, 'topEventsReports'])->name('crre.topeventsreports');

    // SEARCH MUST COME BEFORE CATEGORY
    Route::get('/search', [CrreController::class, 'SearchContent'])
        ->name('crre.search');
    Route::get('tag/{tagslug}',  [CrreController::class, 'crreTags'])
        ->name('crre.tags');
    // AJAX NEXT ARTICLE (STATIC)
    Route::get('/next-article', [CrreController::class, 'nextArticle'])
        ->name('crre.nextArticle');
    // DETAIL PAGE LAST (catch-most)
    Route::get('{type}/{slug}.{id}', [CrreController::class, 'detailpage'])
        ->name('crre.detailpage');

    // CATEGORY (single slug)
    Route::get('{category}', [CrreController::class, 'topCategories'])
        ->name('crre.topcategories');

    // CATEGORY + SUBCATEGORY (two slugs)
    Route::get('{category}/{subcategory}', [CrreController::class, 'topSubCategory'])
        ->name('crre.topsubcategories');
    Route::get('/search',                       [CrreController::class, 'SearchContent'])
        ->name('crre.search');
});
