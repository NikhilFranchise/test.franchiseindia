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
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\RestaurantController;
Use App\Http\Controllers\ArticleController;

use Illuminate\Support\Facades\Route;




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

Auth::routes();

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

Route::get('/top-100-franchise',    [NewHomePageController::class,'top100']);

//Payment Routes
Route::get('payment', [PaymentController::class, 'payment']);

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
        Route::post('upgrade-account', [FranchisorController::class, 'upgradeAccount']);
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

// FranchisorPayment Routes
Route::post('franpaymentsubmit', [FranPaymentController::class, 'paymentHdfcPayuPg']);
Route::post('franfailed', [FranPaymentController::class, 'paymentFailure']);
Route::post('fransuccess', [FranPaymentController::class, 'paymentSuccess']);
Route::post('francancelled', [FranPaymentController::class, 'paymentCancelled']);
Route::post('franfailedmyaccount', [FranPaymentController::class, 'paymentFailureMyAccount']);
Route::post('fransuccessmysccount', [FranPaymentController::class, 'paymentSuccessMyAccount']);
Route::post('francancelledmyaccount', [FranPaymentController::class, 'paymentCancelledMyAccount']);


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
Route::post('invsuccess', [PaymentController::class, 'investorPaymentSuccess']);        // Investor Payment success routes
Route::post('bookpaymentsubmit', [PaymentController::class, 'bookPayment']);                   // Books & Reports Payment section routes
Route::post('payment/booksuccess', [PaymentController::class, 'bookPaymentSuccess']);            // Books & Reports Payment section routes
Route::post('GetHandleRES', [PaymentController::class, 'getHdfcPgResponse']);
Route::post('paymentsubmit', [PaymentController::class, 'paymentHdfcPayuPg']);
Route::post('payment/success', [PaymentController::class, 'paymentSuccess']);
Route::post('payment/failure', [PaymentController::class, 'getHdfcPgResponseFailed']);
Route::post('payment/cancelled', [PaymentController::class, 'getHdfcPgResponseFailed']);
Route::get('confirm/{id}', [CommonController::class, 'verifyEmail']); // Mail Verification
Route::get('newsletter/{code}', [NewsLetterController::class, 'subscriptionForm']);

// Restaurant Routes
Route::group( [ 'prefix' => 'restaurant' ], function()
{
    Route::get('/',                      [RestaurantController::class,'articleRestaurant']);
    Route::get('about',                      function() { return redirect('https://www.restaurantindia.in/about-us', 301);});
    Route::get('contact',                    function() { return redirect('https://www.restaurantindia.in/contact', 301);});
    Route::get('terms',                      function() { return redirect('https://www.restaurantindia.in/terms', 301);});
    Route::get('feedback',                   function() { return redirect('https://www.restaurantindia.in/feedback', 301);});
    Route::get('unsubscribeme',          [MailerController::class,'unsub']);
    Route::get('newsletter/thanks',      [MailerController::class,'newsletterUnsub']);    //Newsletter thanks
    Route::get('newsletter/subscriptionForm',[NewsLetterController::class,'newsletterForm']);
    Route::get('newsletter/newsub',          [NewsLetterController::class,'newsletterSub']);
    Route::get('{content_id}',       [ArticleController::class,'commonInner']);
    Route::post('newslettersignup',        [NewsLetterController::class,'newsletter']);     // Newsletter signup

});

