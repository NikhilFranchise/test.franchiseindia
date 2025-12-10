<?php

use App\Http\Controllers\Crre\Admin\Auth\LoginController;
use App\Http\Controllers\Crre\Admin\AuthorController;
use App\Http\Controllers\Crre\Admin\CategoryController;
use App\Http\Controllers\Crre\Admin\ContentController;
use App\Http\Controllers\Crre\Admin\TagController;
use Illuminate\Support\Facades\Route;

// your admin routes
Route::get('login',  [LoginController::class, 'loginView'])->name('crreAdmin.LoginView');
Route::post('login', [LoginController::class, 'CrreLogin'])->name('crreAdmin.Login');
Route::get('logout', [LoginController::class, 'CrreLogout'])->name('crreAdmin.logout');
Route::post('/check-role', [LoginController::class, 'checkRole'])->name('crreAdmin.checkRole');

Route::view('reset', 'crreAdmin.auth.forgot-password')->name('crreAdmin.reset');
Route::post('forgot', [LoginController::class, 'resetPassword'])->name('crreAdmin.forgot');
Route::group(['middleware' => ['CrreContentAdmin']], function () {
    Route::get('dashboard', [LoginController::class, 'CrreDashboard'])->name('crreAdmin.dashboard');

    Route::group(['prefix' => 'author'], function () {
        Route::get('create', [AuthorController::class, 'createAuthor'])->name('crreAdmin.create.author');
        Route::post('register', [AuthorController::class, 'registerAuthor'])->name('crreAdmin.register.author');
        Route::get('list', [AuthorController::class, 'listAuthor'])->name('crreAdmin.list.author');
        Route::get('edit/{id}', [AuthorController::class, 'editAuthor'])->name('crreAdmin.edit.author');
        Route::post('update', [AuthorController::class, 'updateAuthor'])->name('crreAdmin.update.author');
        Route::post('status', [AuthorController::class, 'updateAuthorStatus'])->name('crreAdmin.status.author');
        Route::post('delete/{id}', [AuthorController::class, 'deleteAuthor'])->name('crreAdmin.delete.author');
        Route::get('publisher',     [AuthorController::class, 'publisher'])->name('crreAdmin.author.select');
        Route::get('profile/{id}',     [AuthorController::class, 'authorProfile'])->name('crreAdmin.author.profile');
    });

    // Tag routes
    Route::group(['prefix' => 'tag/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [TagController::class, 'createTag'])->name('crreAdmin.tag.create');
        Route::post('store', [TagController::class, 'storeTag'])->name('crreAdmin.tag.store');
        Route::get('list', [TagController::class, 'listTag'])->name('crreAdmin.tag.list');
        Route::post('delete/{id}', [TagController::class, 'deleteTag'])->name('crreAdmin.tag.delete');
        Route::get('associatedtags', [TagController::class, 'associatedTags'])->name('crreAdmin.tag.associated');
    });

    // Category routes
    Route::group(['prefix' => 'cat/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [CategoryController::class, 'createCategory'])->name('crreAdmin.cat.create');
        Route::post('store', [CategoryController::class, 'storeCategory'])->name('crreAdmin.cat.store');
        Route::get('list', [CategoryController::class, 'listCategory'])->name('crreAdmin.cat.list');
        Route::get('edit/{id}', [CategoryController::class, 'editCategory'])->name('crreAdmin.cat.edit');
        Route::post('update', [CategoryController::class, 'updateCategory'])->name('crreAdmin.cat.update');
        Route::post('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('crreAdmin.cat.delete');
    });
    // Sub Category routes
    Route::group(['prefix' => 'subcat/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [CategoryController::class, 'createSubCategory'])->name('crreAdmin.subcat.create');
        Route::post('store', [CategoryController::class, 'storeSubCategory'])->name('crreAdmin.subcat.store');
        Route::get('list', [CategoryController::class, 'listSubCategory'])->name('crreAdmin.subcat.list');
        Route::get('edit/{id}', [CategoryController::class, 'editSubCategory'])->name('crreAdmin.subcat.edit');
        Route::post('update', [CategoryController::class, 'updateSubCategory'])->name('crreAdmin.subcat.update');
        Route::post('delete/{id}', [CategoryController::class, 'deleteSubCategory'])->name('crreAdmin.subcat.delete');
        Route::get('getSubcategories/{catid}', [CategoryController::class, 'getSubcategories'])->name('crreAdmin.getsubCategories');
    });

    //  Content routes
    Route::group(['prefix' => 'content/{lang}', 'where' => ['lang' => 'en|hi']], function () {
        Route::get('create', [ContentController::class, 'createContent'])->name('crreAdmin.content.create');
        Route::post('store', [ContentController::class, 'storeContent'])->name('crreAdmin.content.store');
        Route::get('list', [ContentController::class, 'listContent'])->name('crreAdmin.content.list');
        Route::get('edit/{id}', [ContentController::class, 'editContent'])->name('crreAdmin.content.edit');
        Route::post('update', [ContentController::class, 'updateContent'])->name('crreAdmin.content.update');
        Route::post('status', [ContentController::class, 'status'])->name('crreAdmin.content.status');
        Route::post('delete/{id}', [ContentController::class, 'deleteContent'])->name('crreAdmin.content.delete');
        Route::get('quick-records', [ContentController::class, 'ContentRecords'])->name('crreAdmin.content.quick');
        Route::post('bulk-store', [ContentController::class, 'saveMultipleContent'])->name('crreAdmin.content.bulkStore');
    });
    Route::get('stats', [ContentController::class, 'monthlyStats'])->name('crreAdmin.content.stats');
});
