<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SearchMonitorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InsightController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\VideoPodcastController;

Auth::routes();
//Get routes
Route::get('login',  [LoginController::class, 'loginView'])->name('admin.LoginView');
Route::post('login', [LoginController::class, 'adminLogin'])->name('admin.Login');
Route::get('logout', [LoginController::class, 'logout'])->name('admin.Logout');
Route::view('reset', 'admin.auth.forgot-password')->name('admin.reset');
Route::post('forgot', [LoginController::class, 'resetPassword'])->name('admin.forgot');
Route::middleware(['ContentAdmin'])->group(function () {
    Route::get('dashboard', [LoginController::class, 'viewDashboard'])->name('admin.Dashboard');



    // top search data start
    Route::get('/data', [SearchMonitorController::class, 'showDataForm'])->name('search.data.form');
    Route::post('/data', [SearchMonitorController::class, 'fetchData'])->name('search.data.fetch');
    Route::get('stats', [SearchMonitorController::class, 'monthlyStats'])->name('insights.stats');

    // top seacrh data end

    Route::group(['prefix' => 'author'], function () {
        Route::get('create', [AuthorController::class, 'createAuthor'])->name('create.author');
        Route::post('register', [AuthorController::class, 'registerAuthor'])->name('register.author');
        Route::get('list', [AuthorController::class, 'listAuthor'])->name('list.author');
        Route::get('edit/{id}', [AuthorController::class, 'editAuthor'])->name('edit.author');
        Route::post('update', [AuthorController::class, 'updateAuthor'])->name('update.author');
        Route::post('status', [AuthorController::class, 'updateAuthorStatus'])->name('status.author');
        Route::post('delete/{id}', [AuthorController::class, 'deleteAuthor'])->name('delete.author');
        Route::get('publisher',     [AuthorController::class, 'publisher'])->name('author.select');
        Route::get('profile/{id}',     [AuthorController::class, 'authorProfile'])->name('author.profile');
    });
    // Tag routes
    Route::group(['prefix' => 'tag/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [TagController::class, 'createTag'])->name('tag.create');
        Route::post('store', [TagController::class, 'storeTag'])->name('tag.store');
        Route::get('list', [TagController::class, 'listTag'])->name('tag.list');
        Route::post('delete/{id}', [TagController::class, 'deleteTag'])->name('delete.tag');
        Route::get('associatedtags', [TagController::class, 'associatedTags'])->name('associated.tag');
    });
    // Category routes
    Route::group(['prefix' => 'cat/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [CategoryController::class, 'createCategory'])->name('cat.create');
        Route::post('store', [CategoryController::class, 'storeCategory'])->name('cat.store');
        Route::get('list', [CategoryController::class, 'listCategory'])->name('cat.list');
        Route::get('edit/{id}', [CategoryController::class, 'editCategory'])->name('cat.edit');
        Route::post('update', [CategoryController::class, 'updateCategory'])->name('cat.update');
        Route::post('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.cat');
    });
    // Sub Category routes
    Route::group(['prefix' => 'subcat/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [CategoryController::class, 'createSubCategory'])->name('subcat.create');
        Route::post('store', [CategoryController::class, 'storeSubCategory'])->name('subcat.store');
        Route::get('list', [CategoryController::class, 'listSubCategory'])->name('subcat.list');
        Route::get('edit/{id}', [CategoryController::class, 'editSubCategory'])->name('subcat.edit');
        Route::post('update', [CategoryController::class, 'updateSubCategory'])->name('subcat.update');
        Route::post('delete/{id}', [CategoryController::class, 'deleteSubCategory'])->name('delete.subcat');
        Route::get('getSubcategories/{catid}', [CategoryController::class, 'getSubcategories'])->name('getsubCategories');
    });
    //  Insights routes
    Route::group(['prefix' => 'insights/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [InsightController::class, 'createInsights'])->name('insights.create');
        Route::post('store', [InsightController::class, 'storeInsights'])->name('insights.store');
        Route::get('list', [InsightController::class, 'listInsights'])->name('insights.list');
        Route::get('edit/{id}', [InsightController::class, 'editInsights'])->name('insights.edit');
        Route::post('update', [InsightController::class, 'updateInsights'])->name('insights.update');
        Route::post('status', [InsightController::class, 'status'])->name('insights.status');
        Route::post('delete/{id}', [InsightController::class, 'deleteInsights'])->name('delete.insights');
        Route::get('quick-records', [InsightController::class, 'insightsRecords'])->name('insights.quick');
        Route::post('bulk-store', [InsightController::class, 'saveMultipleInsights'])->name('insights.bulkStore');
    });

    // Podcast routes
    Route::group(['prefix' => 'podcast/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [VideoPodcastController::class, 'podcastcreate'])->name('podcast.create');
        Route::post('store', [VideoPodcastController::class, 'podcastore'])->name('podcast.store');
        Route::get('list', [VideoPodcastController::class, 'podcastList'])->name('podcast.list');
        Route::get('edit/{id}', [VideoPodcastController::class, 'podcastEdit'])->name('podcast.edit');
        Route::post('update', [VideoPodcastController::class, 'podcastUpdate'])->name('podcast.update');
        Route::post('delete/{id}', [VideoPodcastController::class, 'deletepodcast'])->name('delete.podcast');
        Route::post('status', [VideoPodcastController::class, 'updatepodcastatus'])->name('podcast.status');
    });
    // Video routes
    Route::group(['prefix' => 'video/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [VideoPodcastController::class, 'videoCreate'])->name('video.create');
        Route::post('store', [VideoPodcastController::class, 'videoStore'])->name('video.store');
        Route::get('list', [VideoPodcastController::class, 'videoList'])->name('video.list');
        Route::get('edit/{id}', [VideoPodcastController::class, 'videoEdit'])->name('video.edit');
        Route::post('update', [VideoPodcastController::class, 'videoUpdate'])->name('video.update');
        Route::post('delete/{id}', [VideoPodcastController::class, 'videoDelete'])->name('video.delete');
        Route::post('status', [VideoPodcastController::class, 'videoStatus'])->name('video.status');
    });
});

Route::get('list-news', [AdminController::class, 'listNews']);
Route::get('edit-news-view/{id}', [AdminController::class, 'editNewsView']);
Route::get('list-magazine-articles/{id}', [AdminController::class, 'listMagazineArticles']);
Route::get('create-magazine-article/{id}', [AdminController::class, 'createMagazineArticleView']);
Route::get('create-article-interview', [AdminController::class, 'createArticleView']);
Route::get('list-article-interview', [AdminController::class, 'listArticleInterview']);
Route::get('edit-article-interview/{id}', [AdminController::class, 'editViewArticleInterview']);
Route::get('create-news', [AdminController::class, 'createNewsView']);
Route::get('create-magazine', [AdminController::class, 'createMagazineView']);
Route::get('edit-magazine-view/{id}', [AdminController::class, 'editMagazineView']);
Route::get('list-magazine', [AdminController::class, 'listMagazine']);
Route::get('edit-magazine-article/{id}', [AdminController::class, 'editMagazineArticleView']);
Route::get('list-article-interview-comments', [AdminController::class, 'listArticleInterviewComments']);
Route::get('list-news-comments', [AdminController::class, 'listNewsComments']);
Route::get('edit-article-interview-comment/{id}', [AdminController::class, 'editArticleInterviewComment']);
Route::get('edit-news-comment/{id}', [AdminController::class, 'editNewsComment']);
Route::get('article-interview-comment-reply/{id}', [AdminController::class, 'articleCommentReply']);
Route::get('magazine-comment-list', [AdminController::class, 'getMagazineComments']);
Route::get('magzine-comment-search', [AdminController::class, 'searchMagazineComment']);
Route::get('edit-mag-comment/{id}', [AdminController::class, 'editMagazineComment']);
Route::get('{type}/hindi/{contentId}', [AdminController::class, 'getCreateHindiArticleNewsForm']);
//Post routes
Route::post('update-magazine-comment', [AdminController::class, 'updateMagazineComment']);
Route::post('update-mag-comment-status', [AdminController::class, 'setMagazineCommentStatus']);
Route::post('article-comment-reply', [AdminController::class, 'createArticleCommentReply']);
Route::post('edit-comment-reply/{replyId}', [AdminController::class, 'updateArticleCommentReply']);
Route::post('article-register', [AdminController::class, 'createArticle']);
Route::post('create-news', [AdminController::class, 'createNews']);
Route::post('create-magazine', [AdminController::class, 'createMagazine']);
Route::post('edit-magazine', [AdminController::class, 'updateMagazine']);
Route::post('article-interview-edit', [AdminController::class, 'editArticleInterview']);
Route::post('create-magazine-article', [AdminController::class, 'createMagazineArticle']);
Route::post('update-magazine-article', [AdminController::class, 'updateMagazineArticle']);
Route::post('update-news', [AdminController::class, 'updateNews']);
Route::post('edit-article-interview-comment', [AdminController::class, 'updateArticleInterviewComment']);
Route::post('edit-news-comment', [AdminController::class, 'updateNewsComment']);
Route::post('delete-article-slider-image', [AdminController::class, 'deleteArticleSliderImage']);
Route::post('hindi/create', [AdminController::class, 'createUpdateHindiArticle']);
