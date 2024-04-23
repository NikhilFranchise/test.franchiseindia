<?php

use App\Http\Controllers\NewHomePageController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SiteFeedbackController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandFilterController;
use App\Http\Controllers\MobileVerificationController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\FranchisorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ExpressInstaController;
use App\Http\Controllers\BrandCompareController;
use App\Http\Controllers\BusinessListingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvPaymentController;
use App\Http\Controllers\FranPaymentController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Auth::routes();


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [NewHomePageController::class, 'homeNew']);
Route::get('/home', function () {
    return redirect('/', 301);
});
Route::get('pagenotfound', function () {
    return view('static.404');
}); //404 ERROR PAGE
Route::get('/hi', [NewHomePageController::class, 'hindiHomePage']);
Route::get('about', [StaticPageController::class, 'aboutus']);
Route::get('contact', [ContactUsController::class, 'contactUsForm']);
Route::get('feedback', [SiteFeedbackController::class, 'feedbackForm']);
Route::get('testimonials', [StaticPageController::class, 'getTestimonials']);
Route::get('terms', [StaticPageController::class, 'mainTerm']);
Route::get('getcitylistBystatename', [CommonController::class, 'getCityListBystateName']);
Route::get('invester-verifyformmobilenumber', [MobileVerificationController::class, 'investerverifyMobile']);
Route::get('/user/check-mobile-status', [CommonController::class, 'verifyMobile']);
Route::get('verifyformmobilenumber', [MobileVerificationController::class, 'verifyMobile']);
Route::get('verify', [MobileVerificationController::class, 'verifyMobile']);
Route::get('/user/investor-mobile-verify', [CommonController::class, 'investormobileverify']);
Route::get('validate-email', [CommonController::class, 'emailValidation']);
Route::get('thanks-advice-form', function () {
    return view('thanks.advice-form');
});
Route::get('property-loan', [StaticPageController::class, 'getPropertyLoanForm']);
Route::get('getpincode', [CommonController::class, 'getPincodeDetails']);
Route::get('get-city-list-landing-page', [CommonController::class, 'getCityListLandingPage']);
Route::get('getsubcategory', [CommonController::class, 'getSubCategory']);
Route::get('getsubcatcategory', [CommonController::class, 'getSubCatCategory']);
Route::get('getcitylist', [CommonController::class, 'getCityList']);
Route::get('most-visitedbrands', [BrandFilterController::class, 'topbrands']);
Route::get('brands/{profileName}', [BrandController::class, 'brandDetails']);
Route::get('check-existing-registration', [InvestorController::class, 'checkInvestorExistence']);
Route::get('mobcheck', [MobileVerificationController::class, 'mobCheck']);
Route::get('get-city-list-landing-page', [CommonController::class, 'getCityListLandingPage']);
Route::get('compare-brands', [BrandCompareController::class, 'compareBrands']);
Route::get('get-brands', [BrandCompareController::class, 'getComparableBrands']);
Route::get('/get-brand-compare', [BrandCompareController::class, 'getSingleBrand']);
// post routes
Route::post('property-loan-submit', [StaticPageController::class, 'postPropertyLoanForm']);
Route::post('contact-submit', [ContactUsController::class, 'contact']);
Route::post('feedback', [FeedbackController::class, 'feedback']);
Route::post('freeadvice', [AdviceController::class, 'freeadvice']);
Route::post('brandlikes', [BrandController::class, 'likes']);
Route::post('brandratings', [BrandController::class, 'ratings']);
Route::post('brandcontactinfo', [ExpressInstaController::class, 'brandInfo']);     //guest
Route::post('compare-brands', [BrandCompareController::class, 'compareBrands']);
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::get('loginform', [LoginController::class, 'showLoginForm'])->name('franchise.login');
Route::post('loginform', [LoginController::class, 'login'])->name('franchise.login.submit');
Route::get('logoutprofile', [LoginController::class, 'logoutProfile']);
Route::get('fibl/login', [LoginController::class, 'fiblLogin']);  // FIBL brand routes
Route::post('fibl/login', [LoginController::class, 'fiblLoginCheck']);
Route::post('getfreeinfo', [ExpressInstaController::class, 'freeInfo']);      //guest


//Payment Routes
Route::get('payment',                         [PaymentController::class,'payment']);

// FranchisorPayment Routes
Route::post('franpaymentsubmit',              [FranPaymentController::class,'paymentHdfcPayuPg']);
Route::post('franfailed',                     [FranPaymentController::class,'paymentFailure']);
Route::post('fransuccess',                    [FranPaymentController::class,'paymentSuccess']);
Route::post('francancelled',                  [FranPaymentController::class,'paymentCancelled']);
Route::post('franfailedmyaccount',            [FranPaymentController::class,'paymentFailureMyAccount']);
Route::post('fransuccessmysccount',           [FranPaymentController::class,'paymentSuccessMyAccount']);
Route::post('francancelledmyaccount',         [FranPaymentController::class,'paymentCancelledMyAccount']);


Route::group(['prefix' => 'investor'], function () {
    Route::get('plan', [InvestorController::class, 'campaignPlan']);
    Route::get('create-new', [InvestorController::class, 'campaignNewRegistration']);
    Route::get('verifyotp', [CommonController::class, 'vrifyOtp']);
    Route::get('verify-otp', [CommonController::class, 'investervrifyOtp']);
    Route::get('checkmobilestatus', [CommonController::class, 'verifyMobile']);
    // Route::get('registration', [InvestorController::class, 'viewInvestorRegistrationForm']); not working on live site
    Route::get('campaign/create', [InvestorController::class, 'rviewInvQuickRegForm']);
    Route::get('create', function () {
        return view('investor/register/investor-quick-registration');
    });
    Route::get('quickregistration', function () {
        return view('investor/register/investor-quick-registration');
    });

    // post routes of investor
    Route::post('inv-plan', [InvestorController::class, 'upgradeInvestor']);
    Route::post('register', [InvestorController::class, 'createInvestor']);
    Route::post('plan-submit', [InvestorController::class, 'setcampaignPlan']);
    Route::post('makepayment', [PaymentController::class, 'upgradeInvestorMembership']);
    // Route::post('campaign/plan', [InvestorController::class, 'campaignPlanCheck']);
    // Route::post('campaign/login', 'Auth\LoginController@loginInvCampaign');
    // Route::post('campaign/update', [InvestorController::class, 'updateCampaignInfo']);
    //myaccount routes for investor
    Route::group(['prefix' => 'myaccount'], function () {
        //Get routes
        Route::get('dashboard', [InvestorController::class, 'viewDashboard']);
        Route::get('expressed-interest', [InvestorController::class, 'expressInterest']);
        Route::get('responsemanager', [InvestorController::class, 'responseManager']);
        Route::get('payment', [InvestorController::class, 'paymentPlan']);
        Route::get('viewprofile', [InvestorController::class, 'viewprofile']);
        Route::get('recommendations', [InvestorController::class, 'getRecommendations']);
        Route::get('personaldetails', [InvestorController::class, 'showPersonalDetails']);
        Route::get('propertydetails', [InvestorController::class, 'showPropertyDetails']);
        Route::get('jobdetails', [InvestorController::class, 'showJobDetails']);
        Route::get('businessdetails', [InvestorController::class, 'showBusinessDetails']);
        Route::get('investmentdetails', [InvestorController::class, 'showinvestmentdetails']);
        Route::get('matchalert', [InvestorController::class, 'showMatchAlert']);
        Route::get('changepassword', [InvestorController::class, 'showPassword']);
        Route::get('feedback', [InvestorController::class, 'showFeedback']);
        Route::get('advertisewithus', function () {
            return view('investor/myAccount/advertisewithus');
        });

        //Post routes
        Route::post('updatepersonaldetails', [InvestorController::class, 'updatePersonalDetails']);
        Route::post('updatepropertydetails', [InvestorController::class, 'updatePropertyDetails']);
        Route::post('updatebusinessdetails', [InvestorController::class, 'updateBusinessDetails']);
        Route::post('updatejobdetails', [InvestorController::class, 'updateJobDetails']);
        Route::post('updateinvestmentdetails', [InvestorController::class, 'updateinvestmentdetails']);
        Route::post('updatepassword', [InvestorController::class, 'updatePassword']);
        Route::post('updatematchalert', [InvestorController::class, 'updateMatchAlert']);
        Route::post('feedback', [FeedbackController::class, 'feedback']);
    });
});
// Investor payment route
Route::post('invpaymentsubmit', [InvPaymentController::class, 'paymentHdfcPayuPg']);
Route::post('invfailed', [InvPaymentController::class, 'paymentFailure']);
Route::post('invcancelled', [InvPaymentController::class, 'paymentFailure']);
// Franchisor routes
Route::get('franchisorregistration', function () {
    return redirect('franchisor/registration/step/1');
});
Route::get('franchisor/registration/step/{step}', [FranchisorController::class, 'viewFranchisorRegistrationForm']);
Route::post('franchisor/registration/step/2', [FranchisorController::class, 'firstStepSubmit']);
Route::post('franchisor/registration/step/3', [FranchisorController::class, 'secondStepSubmit']);
Route::post('franchisor/registration/step/4', [FranchisorController::class, 'thirdStepSubmit']);
Route::post('franchisor/registration/step/5', [FranchisorController::class, 'fourthStepSubmit']);
Route::post('franchisor/registration/step/6', [FranchisorController::class, 'planSubmit']);
Route::post('franchisor/registration/plan', [FranchisorController::class, 'fifthStepSubmit']);
Route::post('franchisor/registration/step/final', [FranchisorController::class, 'finalStepSubmit']);
Route::get('advertise-with-us-payment', [FranchisorController::class, 'advertisewithuspayment']);
Route::post('advertise-with-us-payment', [FranchisorController::class, 'advertisewithussubmit']);
// franchisor routes
Route::group(['prefix' => 'franchisor'], function () {
    Route::get('verifyotp', [CommonController::class, 'vrifyOtp']);
    Route::get('checkmobilestatus', [CommonController::class, 'verifyMobile']);

    Route::group(['prefix' => 'myaccount'], function () {
        Route::get('dashboard', [FranchisorController::class, 'viewDashboard']);
        Route::get('view-profile', [FranchisorController::class, 'viewProfile']);
        Route::get('insta-response', [FranchisorController::class, 'instaResponse']);
        Route::get('expressed-interest', [FranchisorController::class, 'expressInterest']);
        Route::get('businessdetails', [FranchisorController::class, 'viewBusinessDetails']);
        Route::get('professionaldetails', [FranchisorController::class, 'viewProfessionalDetails']);
        Route::get('propertydetails', [FranchisorController::class, 'viewPropertyDetails']);
        Route::get('training-aggrement-details', [FranchisorController::class, 'viewTrainingAgreement']);
        Route::get('payment-plan', [FranchisorController::class, 'paymentPlan']);
        Route::get('appearance', [FranchisorController::class, 'appearance']);
        Route::get('logo', [FranchisorController::class, 'franPhotoChange']);
        Route::get('responsemanager', [FranchisorController::class, 'viewResponseManager']);
        Route::post('upgrade-account',                [FranchisorController::class,'upgradeAccount']);
        Route::get('advertisewithus', function () {
            return view('franchisor/myAccount/advertisewithus');
        });
        Route::get('changepassword', function () {
            return view('franchisor/myAccount/changepassword');
        });

        Route::post('updatepassword', [FranchisorController::class, 'updatePassword']);
        Route::post('fran-photochange', [FranchisorController::class, 'franPhotoUpload'])->name('fran.photochange');
        Route::post('updatebusinessdetails', [FranchisorController::class, 'updateBusinessDetails']);
        Route::post('updateprofessionaldetails', [FranchisorController::class, 'updateProfessionalDetails']);
        Route::post('updatepropertydetails', [FranchisorController::class, 'updatePropertyDetails']);
        Route::post('updatetrainingaggrementdetails', [FranchisorController::class, 'updateTrainingAgreement']);

    });
});
Route::group(['prefix' => 'business-opportunities'], function () {
    Route::get('all/all', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('franchises-{price_range}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('tamilnadu.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('telangana.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('andaman-and-nicobar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('maharashtra.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('delhi.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('karnataka.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('west-bengal.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('gujarat.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('uttar-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('madhya-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('haryana.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('rajasthan.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('andhra-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('kerala.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('punjab.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('chandigarh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('arunachal-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('assam.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('bihar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('chhattisgarh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('daman-and-diu.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('goa.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('jharkhand.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('lakshadweep.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('manipur.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('meghalaya.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('mizoram.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('nagaland.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('odisha.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('pondicherry.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('sikkim.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('tripura.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('uttarakhand.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('himachal-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('jammu-and-kashmir.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);

    Route::get('{searchTerm}.FT{ftype}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{categoryIds}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}/{range}', [BusinessListingController::class, 'searchBusinessListing']);

    Route::get('{catUrl}.{category_param}', [BusinessListingController::class, 'getBusinessListingnormalization']);
    Route::get('{lowcost}', [BusinessListingController::class, 'searchBusinessListingnormalization']);
    Route::get('/lowcost', [BusinessListingController::class, 'searchBusinessListing'])
        ->defaults('lowcost', 'lowcost');


    Route::get('{code}/all/all', function () {
        return redirect('business-opportunities/all/all', 301);
    });
    Route::get('all/{code}/all/', function () {
        return redirect('business-opportunities/all/all', 301);
    });
});

// /Category Page Routes
Route::group(['prefix' => 'category'], function () {
    Route::get('atoz', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('search', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('searchby', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('index', function () {
        return redirect('business-opportunities/all/all', 301);
    });
});
Route::get('sitemapgenerate', [SitemapController::class, 'sitemap']); // Sitemap Generator route

//Admin Panel Routes
Route::get('relatedbrands', [AdminController::class, 'relatedBrands']);
Route::get('associatedtags', [AdminController::class, 'associatedTags']);
Route::get('publisher', [AdminController::class, 'publisher']);
Route::get('find', [AdminController::class, 'find']);
Route::get('searcharticleinterview', [AdminController::class, 'searchArticleInterview']);
Route::get('searchnews', [AdminController::class, 'searchNews']);
Route::get('searchmagazine', [AdminController::class, 'searchMagazine']);
Route::get('articleinterviewcommentsearch', [AdminController::class, 'searchArticleInterviewComment']);
Route::get('newscommentsearch', [AdminController::class, 'searchNewsComment']);
Route::get('admin-logout', [AdminController::class, 'logout']);
//Admin Panel Post Routes
Route::post('invsuccess', [PaymentController::class, 'investorPaymentSuccess']);        // Investor Payment success routes
Route::post('bookpaymentsubmit', [PaymentController::class, 'bookPayment']);                   // Books & Reports Payment section routes
Route::post('payment/booksuccess', [PaymentController::class, 'bookPaymentSuccess']);            // Books & Reports Payment section routes
Route::post('GetHandleRES', [PaymentController::class, 'getHdfcPgResponse']);
Route::post('paymentsubmit', [PaymentController::class, 'paymentHdfcPayuPg']);
Route::post('payment/success', [PaymentController::class, 'paymentSuccess']);
Route::post('payment/failure', [PaymentController::class, 'getHdfcPgResponseFailed']);
Route::post('payment/cancelled', [PaymentController::class, 'getHdfcPgResponseFailed']);

//Admin Panel Post Routes
Route::post('updateauthorstatus', [AdminController::class, 'updateAuthorStatus']);
Route::post('updatearticalinterviewstatus', [AdminController::class, 'updateArticalInterviewStatus']);
Route::post('updatenewsstatus', [AdminController::class, 'updateNewsStatus']);
Route::post('updateaicommentstatus', [AdminController::class, 'updateAICommentStatus']);
Route::post('updatenewscommentstatus', [AdminController::class, 'updateNewsCommentStatus']);
Route::post('updatemagazinestatus', [AdminController::class, 'updateMagazineStatus']);
Route::post('deletemagazine', [AdminController::class, 'deleteMagazine']);
Route::post('updatemagazinearticlestatus', [AdminController::class, 'updateMagazineArticleStatus']);
Route::post('deletemagazinearticle', [AdminController::class, 'deleteMagazineArticle']);
Route::post('deletearticle', [AdminController::class, 'deleteArticle']);
Route::post('deletenews', [AdminController::class, 'deleteNews']);
//admin panel routes
Route::group(['prefix' => 'admin'], function () {
    //Get routes
    Route::get('login', [AdminController::class, 'loginView']);
    Route::get('list-news', [AdminController::class, 'listNews']);
    Route::get('edit-news-view/{id}', [AdminController::class, 'editNewsView']);
    Route::get('dashboard', [AdminController::class, 'viewDashboard']);
    Route::get('create-author', [AdminController::class, 'createAuthor']);
    Route::get('edit-author/{id}', [AdminController::class, 'viewAuthor']);
    Route::get('list-magazine-articles/{id}', [AdminController::class, 'listMagazineArticles']);
    Route::get('create-magazine-article/{id}', [AdminController::class, 'createMagazineArticleView']);
    Route::get('list-author', [AdminController::class, 'listAuthor']);
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
    Route::get('kicker/create/{type}', [AdminController::class, 'getCreateKickerView']);
    Route::get('get-kickers', [AdminController::class, 'getHindiKickers']);
    Route::get('kickers/list/{type}', [AdminController::class, 'getKickersList']);
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
    Route::post('author-edit', [AdminController::class, 'updateAuthor']);
    Route::post('author-register', [AdminController::class, 'registerAuthor']);
    Route::post('login-check', [AdminController::class, 'loginCheck']);
    Route::post('update-news', [AdminController::class, 'updateNews']);
    Route::post('edit-article-interview-comment', [AdminController::class, 'updateArticleInterviewComment']);
    Route::post('edit-news-comment', [AdminController::class, 'updateNewsComment']);
    Route::post('delete-article-slider-image', [AdminController::class, 'deleteArticleSliderImage']);
    Route::post('create/kicker/{type}', [AdminController::class, 'insertUpdateKicker']);
    Route::post('delete-kicker', [AdminController::class, 'deleteKicker']);
    Route::post('hindi/create', [AdminController::class, 'createUpdateHindiArticle']);
    // insights get routes code by gp
    Route::get('create-insights', [AdminController::class, 'createinsightsView']);
    Route::get('list-insights', [AdminController::class, 'listinsights']);
    Route::get('edit-insights-view/{id}', [AdminController::class, 'editInsightsView']);
    // insights post routes
    Route::post('/create-insights', [AdminController::class, 'createInsights']);
    Route::post('update-insights', [AdminController::class, 'updateInsights']);
    Route::post('updateinsightstatus', [AdminController::class, 'updateInsightStatus']);
    Route::post('deleteinsights', [AdminController::class, 'deleteInsights']);
    // insights post routes end here
    // category and sub category get routes code by gp
    Route::get('cat/create', [AdminController::class, 'categoryform']);
    Route::get('subcat/create', [AdminController::class, 'subcatform']);
    Route::get('cat/list', [AdminController::class, 'catlist']);
    Route::get('subcat/list', [AdminController::class, 'subcatlist']);
    Route::get('getSubcategories/{catid}', [AdminController::class, 'getSubcategories']);
    // routes/web.php
    // insights post routes
    Route::post('create/cat', [AdminController::class, 'storecat']);
    Route::post('create/subcat', [AdminController::class, 'storesubcat']);
    Route::post('delete-category', [AdminController::class, 'deleteCat']);
    Route::post('delete-subcategory', [AdminController::class, 'deletesubCat']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
