<?php

use App\Http\Controllers\NewHomePageController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\SiteFeedbackController;
use App\Http\Controllers\CommonController;
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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InstaSubscribeController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AmpArticleController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\InternationalController;
use App\Http\Controllers\EIController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\FacebookArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewArticleController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StartupEventController;
use App\Http\Controllers\WellnessController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DealersAndDistributorController;
use App\Http\Controllers\InsightsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;




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



// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::get('campaign/franchisor/{id}', [CommonController::class, 'franAutoLogin']);
Route::get('campaign/deactivate/franchisor/{id}', [CommonController::class, 'franCampaignDeactivation']);
Route::get('franchiseinternational', [InternationalController::class, 'getHomePage']); // International Page routes


Route::get('/', [NewHomePageController::class, 'homeNew']);
Route::get('/home', function () {
    return redirect('/', 301);
});
Route::get('/dashboard', function () {
    return redirect('/', 301);
});
Route::get('/contact/site', function () {
    return redirect('/contact', 301);
});
Route::get('pagenotfound', function () {
    return view('static.404');
}); //404 ERROR PAGE

Route::get('/hi', [NewHomePageController::class, 'hindiHomePage']); //checck
Route::get('about', [StaticPageController::class, 'aboutus']);
Route::get('contact', [ContactUsController::class, 'contactUsForm']);
Route::get('feedback', [SiteFeedbackController::class, 'feedbackForm']);

Route::get('testimonials', function () {
    return redirect('testimonials-reviews', 301);
});
Route::get('testimonials-reviews', [StaticPageController::class, 'getTestimonials']);
Route::get('sitemap/brands', [BrandFilterController::class, 'brandsitemap']);
Route::get('sitemap/brands/{abre}',           [BrandFilterController::class, 'brandfilter']);

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
Route::get('check',                          [MobileVerificationController::class, 'verifySmsOTP']);
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
Route::get('compare-brands', [BrandCompareController::class, 'compareBrands']);
Route::get('get-brands', [BrandCompareController::class, 'getComparableBrands']);
Route::get('/get-brand-compare', [BrandCompareController::class, 'getSingleBrand']);
Route::get('newsletter/unsubscribe/thanks', [MailerController::class, 'newsletterUnsub']);  //unsubscribe thanks msg
Route::get('international', [InternationalController::class, 'getHomePage']); // International Page routes
Route::get('newsletter/subscriptionForm', [NewsLetterController::class, 'newsletterForm']);
Route::get('premiumbrand', [HomepageController::class, 'premiumHome']);
Route::get('dealers-search/{search}',        [DealersAndDistributorController::class, 'searchForDealerHomePage']);
Route::get('dealers-india/search/{search}',  [DealersAndDistributorController::class, 'searchDealer']);
Route::get('mailer',                         [MailerController::class, 'feedbackMailer']);
Route::get('mailermessage',                  [MailerController::class, 'thanksMessage']);
Route::get('cy_mails/unsubscribeme/',        [MailerController::class, 'unsub']);
Route::get('all-insta-responce-csv',                [FranchisorController::class, 'allInstaResponse']); // Insta Responces interest csv copy
Route::get('all-interests-csv',                     [FranchisorController::class, 'allInterestToCsv']);
// post and get routes
Route::post('multipleInvFreeinfo',            [ExpressInstaController::class, 'expressInterestMultiple']); //reg inv multiple
Route::post('newslettersignup', [NewsLetterController::class, 'newsletter']);
Route::post('subscribenews', [NewsLetterController::class, 'subscriptionFormsubmit']);
Route::post('property-loan-submit', [StaticPageController::class, 'postPropertyLoanForm']);
Route::post('contact-submit', [ContactUsController::class, 'contact']);
Route::post('feedback', [FeedbackController::class, 'feedback']);
Route::post('franchisor-feedback',            [FeedbackController::class, 'paidFranchisorFeedback']); // Paid Franchisor Feedback
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
Route::get('auth/{provider}',                [LoginController::class, 'redirectToProvider']);  // Routes for social login
Route::get('auth/{provider}/callback',       [LoginController::class, 'handleProviderCallback']);  // Routes for social login
Route::post('getfreeinfo', [ExpressInstaController::class, 'freeInfo']);      //guest
Route::post('instasubsribe', [InstaSubscribeController::class, 'instasubsribe']);
Route::post('advertise/addform', [AdvertiseController::class, 'advertise']);
Route::post('hi-fi-form-submit', [CampaignController::class, 'insertHiFiCampaign']);
Route::post('magazinecomments', [MagazineController::class, 'commentForm']);
Route::get('/top-100-franchise', [NewHomePageController::class, 'top100']);
Route::post('newscomments', [NewsController::class, 'commentForm']);         // Newscomment
Route::post('startup-mail-submit', [StartupEventController::class, 'mailStartup']); // Event conference routes
Route::post('wivote', [WellnessController::class, 'vote']);
Route::post('wiviewresult', [WellnessController::class, 'viewResult']);
Route::post('unsub', [MailerController::class, 'unsubMailer']); //Newsletter unsubscribe
Route::post('inv-lead',                       [ExpressInstaController::class, 'invLead']);       // inv view cont & exp int & category page exp int
Route::post('inv-lead-normal',                [ExpressInstaController::class, 'invNormalLead']); // paid inv not want
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
        Route::post('updateappearance',               [FranchisorController::class,'editAppearance']);
        Route::post('deleteimage',                    [FranchisorController::class,'deleteSliderImage']);
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
    Route::get('dealers-and-distributors.m5',         function () {
        return redirect('https://dealer.franchiseindia.com/', 301);
    });
    Route::get('education-supplies.sc269',                   function () {
        return redirect('business-opportunities/education-services.sc269', 301);
    });
    Route::get('food',                                       function () {
        return redirect('business-opportunities/food-and-beverage.m2', 301);
    });
    Route::get('accessories',                                function () {
        return redirect('business-opportunities/automobile-accessories.ssc262', 301);
    });
    Route::get('Others',                                     function () {
        return redirect('business-opportunities/others-dealers-and-distributors.ssc126', 301);
    });
    Route::get('bakery',                                     function () {
        return redirect('business-opportunities/bakery-sweets-and-ice-cream.sc424', 301);
    });
    Route::get('lowcost205',                                 function () {
        return redirect('business-opportunities/lowcost', 301);
    });
    Route::get('retail/',                                    function () {
        return redirect('business-opportunities/retail.m9', 301);
    });
    Route::get('.ssc243',                                    function () {
        return redirect('business-opportunities/designer-wear.ssc243', 301);
    });
    Route::get('.ssc198',                                    function () {
        return redirect('business-opportunities/stationery-stores.ssc198', 301);
    });
    Route::get('food-marts',                                 function () {
        return redirect('business-opportunities/food-and-beverage.sc16', 301);
    });
    Route::get('retail-Franchise',                           function () {
        return redirect('business-opportunities/retail.m9', 301);
    });
    Route::get('health-care',                                function () {
        return redirect('business-opportunities/health-care.sc14', 301);
    });
    Route::get('Florists-Franchise/',                        function () {
        return redirect('business-opportunities/florists.ssc207', 301);
    });
    Route::get('.m1',                                        function () {
        return redirect('business-opportunities/beauty-and-health.m1', 301);
    });
    Route::get('.ssc127',                                    function () {
        return redirect('business-opportunities/courier-and-delivery.ssc127', 301);
    });
    Route::get('.ssc156',                                    function () {
        return redirect('business-opportunities/matrimonial.ssc156', 301);
    });
    Route::get('.ssc110',                                    function () {
        return redirect('business-opportunities/digital-media-and-internet-marketing.ssc110', 301);
    });
    Route::get('direct-selling',                             function () {
        return redirect('business-opportunities/direct-selling.ssc293', 301);
    });
    Route::get('consulting-Franchise',                       function () {
        return redirect('business-opportunities/consulting-services.ssc300', 301);
    });
    Route::get('Automotive-Franchise',                       function () {
        return redirect('business-opportunities/automotive.m8', 301);
    });
    Route::get('.ssc184',                                    function () {
        return redirect('business-opportunities/photography.ssc184', 301);
    });
    Route::get('.ssc90',                                     function () {
        return redirect('business-opportunities/online-coaching.ssc90', 301);
    });
    Route::get('.sc15',                                      function () {
        return redirect('business-opportunities/hotels-and-resorts.sc15', 301);
    });
    Route::get('.ssc225',                                    function () {
        return redirect('business-opportunities/kids-wear.ssc225', 301);
    });
    Route::get('.ssc130',                                    function () {
        return redirect('business-opportunities/security-services.ssc130', 301);
    });
    Route::get('.LOC1',                                      function () {
        return redirect('business-opportunities/andhra-pradesh.LOC1', 301);
    });
    //Route::get('uttaranchal.LOC31',                          function() { return redirect('business-opportunities/uttarakhand.LOC31', 301);});
    Route::get('Jewellery-Franchise',                        function () {
        return redirect('business-opportunities/jewellery.sc42', 301);
    });
    Route::get('clothing-Franchise/',                        function () {
        return redirect('business-opportunities/clothing.sc40', 301);
    });
    Route::get('mbo-clothing-Franchise',                     function () {
        return redirect('business-opportunities/clothing.sc40', 301);
    });
    Route::get('opticians-eye-wear',                         function () {
        return redirect('business-opportunities/opticians-eye-wear.ssc246', 301);
    });
    Route::get('franchises-under-50Lac',                     function () {
        return redirect('business-opportunities/franchises-under-50lac', 301);
    });
    Route::get('franchises-under-30Lac',                     function () {
        return redirect('business-opportunities/franchises-under-30lac', 301);
    });
    Route::get('GFAI-Franchise',                             function () {
        return redirect('business-opportunities/all/all', 301);
    });
    Route::get('Tanclean-Franchise',                         function () {
        return redirect('business-opportunities/all/all', 301);
    });


    Route::get('/',                                       function () {
        return redirect('business-opportunities/all/all', 301);
    });
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

    // Route::get('{searchTerm}.FT{ftype}', [BusinessListingController::class, 'searchBusinessListing']);
    // Route::get('{searchTerm}/{categoryIds}', [BusinessListingController::class, 'searchBusinessListing']);
    // Route::get('{searchTerm}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
    // Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
    // Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}/{range}', [BusinessListingController::class, 'searchBusinessListing']);
    // Route::get('{catUrl}.{category_param}', [BusinessListingController::class, 'getBusinessListing']);
    // Route::get('{lowcost}', [BusinessListingController::class, 'searchBusinessListing']);

    Route::get('{searchTerm}.FT{ftype}', [BusinessListingController::class, 'searchBusinessListingnormalization']);
    Route::get('{searchTerm}/{categoryIds}', [BusinessListingController::class, 'searchBusinessListingnormalization']);
    Route::get('{searchTerm}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListingnormalization']);
    Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListingnormalization']);
    Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}/{range}', [BusinessListingController::class, 'searchBusinessListingnormalization']);
    Route::get('{catUrl}.{category_param}', [BusinessListingController::class, 'getBusinessListingnormalization']);
    Route::get('{lowcost}', [BusinessListingController::class, 'searchBusinessListing']);




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
// Route::post('payment/cancelled', function() { return view('thanks.paymentfailed');});
Route::get('confirm/{id}', [CommonController::class, 'verifyEmail']); // Mail Verification
Route::get('change-password/{id}',           [CommonController::class, 'verifyEmail']);
Route::get('newsletter/{code}', [NewsLetterController::class, 'subscriptionForm']);

// Restaurant Routes
Route::group(['prefix' => 'restaurant'], function () {
    Route::get('/', [RestaurantController::class, 'articleRestaurant']);
    Route::get('about', function () {
        return redirect('https://www.restaurantindia.in/about-us', 301);
    });
    Route::get('contact', function () {
        return redirect('https://www.restaurantindia.in/contact', 301);
    });
    Route::get('terms', function () {
        return redirect('https://www.restaurantindia.in/terms', 301);
    });
    Route::get('feedback', function () {
        return redirect('https://www.restaurantindia.in/feedback', 301);
    });
    Route::get('unsubscribeme', [MailerController::class, 'unsub']);
    Route::get('newsletter/thanks', [MailerController::class, 'newsletterUnsub']);    //Newsletter thanks
    Route::get('newsletter/subscriptionForm', [NewsLetterController::class, 'newsletterForm']);
    Route::get('newsletter/newsub', [NewsLetterController::class, 'newsletterSub']);
    Route::get('{content_id}', [ArticleController::class, 'commonInner']);
    // Route::post('newslettersignup', [NewsLetterController::class, 'newsletter']);     // Newsletter signup

});



//for books
Route::group(['prefix' => 'book'], function () {
    //Get routes
    Route::get('/', [BookController::class, 'bookHome']);
    Route::get('{name}', [BookController::class, 'bookInner']);
    //Post routes
    Route::post('{name}', [BookController::class, 'bookInner']);
});
// amp routes
// 301 redirect route to remove 'amp' prefix
Route::get('amp/{path}', function ($path) {
    return redirect('/' . $path, 301);
})->where('path', '.*');

// Please do not open amp pages

// Route::group(['prefix' => 'amp'], function () {
//     Route::get('location/{city}', [BusinessListingController::class, 'listingLocation']);   //working
//     Route::get('location', [BusinessListingController::class, 'listingLocation']);          //working

//     //Hindi language amp pages routes
//     Route::group(['prefix' => 'hi'], function () {
//         //Category Page Routes
//         Route::group(['prefix' => 'category'], function () {
//             Route::get('atoz', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('search', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('searchby', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('index', function () {
//                 return redirect('business-opportunities/all/all', 301);
//             });
//         });

//         //Directory Page Routes
//         Route::group(['prefix' => 'business-opportunities'], function () {
//             Route::get('/', function () {
//                 return view('category/category');
//             });
//             Route::get('all/all', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('franchises-{price_range}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('tamilnadu.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('telangana.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('andaman-and-nicobar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('maharashtra.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('delhi.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('karnataka.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('west-bengal.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('gujarat.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('uttar-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('madhya-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('haryana.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('rajasthan.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('andhra-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('kerala.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('punjab.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('chandigarh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('arunachal-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('assam.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('bihar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('chhattisgarh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('daman-and-diu.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('goa.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('jharkhand.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('lakshadweep.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('manipur.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('meghalaya.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('mizoram.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('nagaland.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('odisha.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('pondicherry.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('sikkim.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('tripura.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('uttarakhand.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('himachal-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('jammu-and-kashmir.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);

//             Route::get('{searchTerm}.FT{ftype}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('{searchTerm}/{categoryIds}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('{searchTerm}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
//             Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}/{range}', [BusinessListingController::class, 'searchBusinessListing']);

//             Route::get('{catUrl}.{category_param}', [BusinessListingController::class, 'getBusinessListing']);
//             Route::get('{lowcost}', [BusinessListingController::class, 'searchBusinessListing']);
//         });




//         Route::get('content/{kicker}/{kickerId}', [AmpArticleController::class, 'getAmpHindiKickerList']); // Hindi Kicker Url
//         Route::get('content', [AmpArticleController::class, 'ampArticleHindiHome']);         // Article Hindi Home amp
//         Route::get('brands/{profileName}', [BrandController::class, 'ampBrandDetails']);                // Hindi brand url
//         Route::get('{contentSite}/{title}.{id}', [AmpArticleController::class, 'getAmpHindiArticle']);
//     });

//     //Category Page Routes   working
//     Route::group(['prefix' => 'category'], function () {
//         Route::get('atoz', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('search', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('searchby', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('index', function () {
//             return redirect('business-opportunities/all/all', 301);
//         });
//     });

//     //Directory Page Routes      working
//     Route::group(['prefix' => 'business-opportunities'], function () {
//         Route::get('/', function () {
//             return view('category/category');
//         });
//         Route::get('all/all', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('franchises-{price_range}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('tamilnadu.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('telangana.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('andaman-and-nicobar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('maharashtra.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('delhi.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('karnataka.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('west-bengal.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('gujarat.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('uttar-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('madhya-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('haryana.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('rajasthan.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('andhra-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('kerala.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('punjab.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('chandigarh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('arunachal-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('assam.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('bihar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('chhattisgarh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('daman-and-diu.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('goa.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('jharkhand.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('lakshadweep.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('manipur.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('meghalaya.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('mizoram.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('nagaland.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('odisha.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('pondicherry.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('sikkim.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('tripura.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('uttarakhand.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('himachal-pradesh.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('jammu-and-kashmir.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('{searchTerm}.FT{ftype}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('{searchTerm}/{categoryIds}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('{searchTerm}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}', [BusinessListingController::class, 'searchBusinessListing']);
//         Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}/{range}', [BusinessListingController::class, 'searchBusinessListing']);

//         Route::get('{catUrl}.{category_param}', [BusinessListingController::class, 'getBusinessListing']);
//         Route::get('{lowcost}', [BusinessListingController::class, 'searchBusinessListing']);
//     });



//     Route::get('brands/{profileName}', [BrandController::class, 'ampBrandDetails']);                // Eng AMP brand url  working
//     Route::get('{contentSite}/{title}.{id}', [AmpArticleController::class, 'ampCreate']);
// });



//Education routes
Route::group(['prefix' => 'education'], function () {
    //Route::get('/',                          'EducationController@articleEducation');
    Route::get('/', function () {
        return redirect('https://www.opportunityindia.com/english/tag/education', 301);
    });
    Route::get('contact', [ContactUsController::class, 'contactUsForm']);   // Static route for Contact us page
    Route::get('about', [StaticPageController::class, 'aboutus']);        // Static route for About us page
    Route::get('terms', [StaticPageController::class, 'siteTerm']);       // Terms page
    Route::get('feedback', [SiteFeedbackController::class, 'feedbackForm']); // Site Feedback
    Route::get('unsubscribeme', [MailerController::class, 'unsub']);
    Route::get('newsletter/thanks', [MailerController::class, 'newsletterUnsub']);    //Newsletter thanks
    Route::get('newsletter/subscriptionForm', [NewsLetterController::class, 'newsletterForm']);
    Route::get('newsletter/newsub', [NewsLetterController::class, 'newsletterSub']);
    Route::get('{content_id}', [ArticleController::class, 'commonInner']);

    // Route::post('newslettersignup', [NewsLetterController::class, 'newsletter']);     // Newsletter signup
});



//Entrepreneur routes
Route::group(['prefix' => 'entrepreneur'], function () {
    Route::get('/', [ArticleController::class, 'articleHome']);
    Route::get('subscribe', [MailerController::class, 'unsub']);
    Route::get('article/{category}/{subcategory}/{title}', [EIController::class, 'articleInner']);
    Route::get('news/{title}', [EIController::class, 'newsInner']);
    Route::get('interview/{category}/{subcategory}/{title}', [EIController::class, 'interviewInner']);
    Route::get('magazine/{year}/{month}/{title}', [EIController::class, 'magazineInner']);
    Route::get('{params}', function () {
        return redirect(Config('constants.MainDomain') . '/content', 301);
    });
    Route::get('{param1}/{param2}', function () {
        return redirect(Config('constants.MainDomain') . '/content', 301);
    });
    Route::get('{param1}/{param2}/{param3}', function () {
        return redirect(Config('constants.MainDomain') . '/content', 301);
    });
    Route::get('{param1}/{param2}/{param3}/{param4}', function () {
        return redirect(Config('constants.MainDomain') . '/content', 301);
    });
});

Route::get('event', [EventController::class, 'event']);

//Rss Route
Route::get('rss', [FacebookArticleController::class, 'rss']); // Facebook Instant Articles RSS feed route



//Hindi language routes
Route::group(['prefix' => 'hi'], function () {
    //Category Page Routes
    Route::get('location/{city}', [BusinessListingController::class, 'listingLocation']);

    Route::group(['prefix' => 'category'], function () {
        Route::get('atoz', [BusinessListingController::class, 'searchBusinessListing']);
        Route::get('search', [BusinessListingController::class, 'searchBusinessListing']);
        Route::get('searchby', [BusinessListingController::class, 'searchBusinessListing']);
        Route::get('index', function () {
            return redirect('business-opportunities/all/all', 301);
        });
    });





    //Directory Page Routes
    Route::group(['prefix' => 'business-opportunities'], function () {
        // Route::get('dealers-and-distributors.m5',      'DealersAndDistributorController@getHomePage'); // International Page routes
        Route::get('dealers-and-distributors.m5', function () {
            return redirect('https://dealer.franchiseindia.com/', 301);
        });
        Route::get('/', function () {
            return view('category/category');
        });
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

        Route::get('{catUrl}.{category_param}', [BusinessListingController::class, 'getBusinessListing']);
        Route::get('{lowcost}', [BusinessListingController::class, 'searchBusinessListing']);
    });

    Route::get('/', [NewHomePageController::class, 'hindiHomePage']);               // Hindi Home Page
    // Article Hindi Home
    Route::get('content', function () {
        return redirect('https://www.opportunityindia.com/hindi', 301);
    });
    Route::get('content/{kicker}/{kickerId}', function ($kicker) {
        // dd('yes');
        return redirect('https://www.opportunityindia.com/hindi/tag/' . $kicker, 301);
    });       // Hindi Kicker Url
    Route::get('premiumbrand', [HomepageController::class, 'hindiHome']);                // Hindi Premium Brand Page
    Route::get('brands/{profileName}', [BrandController::class, 'brandDetails']);                // Hindi brand url

    Route::get('{site}/{slug}.{id}', [ArticleController::class, 'getHindiContent']);          // Hindi Article Url

    Route::get('newcontent', [NewArticleController::class, 'articleHindiHome']);
    Route::get('newcontent/author/{author}', [NewArticleController::class, 'getAuthorHindiDetails']); // Hindi Author url
    Route::get('newcontent/{kicker}/{kickerId}', [NewArticleController::class, 'getHindiKickerList']);
    Route::get('newcontent/{slug}.{id}', [NewArticleController::class, 'getHindiContent']);
    Route::get('next-article', [NewArticleController::class, 'getNextArticleHindiForRepeat']); // Hindi Repeat
    Route::get('video-and-podcast', [NewArticleController::class, 'getVideoAndPodcast']);
});

// Route::get('content/{kicker}',   function(Request $request){
//     dd('yes');
// });

// [ArticleController::class,'articleKickersPage']);
// Route::get('content/women-entrepreneurs',     [ArticleController::class,'check']);




Route::get('/content/{slug}', function ($slug) {
    // Split the slug by the last dot (.)
    $parts = explode('.', $slug);

    // Extract the article title and id
    $title = implode('-', array_slice($parts, 0, -1));
    $id = end($parts);

    // Redirect to the new domain
    return redirect("https://www.opportunityindia.com/article/{$title}-{$id}", 301);
});

Route::get('/wellness/{slug}', function ($slug) {
    // Split the slug by the last dot (.)
    $parts = explode('.', $slug);

    // Extract the article title and id
    $title = implode('-', array_slice($parts, 0, -1));
    $id = end($parts);

    // Redirect to the new domain
    return redirect("https://www.opportunityindia.com/article/{$title}-{$id}", 301);
});


//Magazine Routes
Route::group(['prefix' => 'magazine'], function () {
    Route::get('/', [MagazineController::class, 'magazineListHome']);
    Route::get('{year}/{month}/The-Franchising-World-{pyear}-{id}', [MagazineController::class, 'magazineList']);
    Route::get('{year}/{month}/{title}.{id}', [MagazineController::class, 'magazineListInner']);
    Route::get('{url}/{urlnew}', function () {
        return redirect('/magazine', 301);
    });
    Route::get('{url}/{urlnew}/{urlmag}', function () {
        return redirect('/magazine', 301);
    });
});
// Route::get('/content/{kicker}',    [ArticleController::class,'articleKickersPage']);
// Route::get('content/{kicker}', function ($kicker) {
//     return redirect('https://www.opportunityindia.com/article' .'-'. $kicker, 301);
// }); 
// Gallery Articles Section
Route::group(['prefix' => 'gallery'], function () {
    Route::get('/', [GalleryController::class, 'galleryArticleHome']);
    Route::get('{title}.{id}', [GalleryController::class, 'galleryArticle']);
    Route::get('{kicker}/{kicker_id}', [GalleryController::class, 'galleryArticleKickersPage']);
});





//Admin Panel Post Routes

Route::post('updateauthorstatus',             [AdminController::class, 'updateAuthorStatus']);
Route::post('updatearticalinterviewstatus',   [AdminController::class, 'updateArticalInterviewStatus']);
Route::post('updatenewsstatus',               [AdminController::class, 'updateNewsStatus']);
Route::post('updateaicommentstatus',          [AdminController::class, 'updateAICommentStatus']);
Route::post('updatenewscommentstatus',        [AdminController::class, 'updateNewsCommentStatus']);
Route::post('updatemagazinestatus',           [AdminController::class, 'updateMagazineStatus']);
Route::post('deletemagazine',                 [AdminController::class, 'deleteMagazine']);
Route::post('updatemagazinearticlestatus',    [AdminController::class, 'updateMagazineArticleStatus']);
Route::post('deletemagazinearticle',          [AdminController::class, 'deleteMagazineArticle']);
Route::post('deletearticle',                  [AdminController::class, 'deleteArticle']);
Route::post('deletenews',                     [AdminController::class, 'deleteNews']);
Route::get('relatedbrands',                   [AdminController::class, 'relatedBrands']);
Route::get('associatedtags',                  [AdminController::class, 'associatedTags']);
Route::get('publisher',                       [AdminController::class, 'publisher']);
Route::get('find',                            [AdminController::class, 'find']);
Route::get('searcharticleinterview',          [AdminController::class, 'searchArticleInterview']);
Route::get('searchnews',                      [AdminController::class, 'searchNews']);
Route::get('searchmagazine',                  [AdminController::class, 'searchMagazine']);
Route::get('articleinterviewcommentsearch',   [AdminController::class, 'searchArticleInterviewComment']);
Route::get('newscommentsearch',               [AdminController::class, 'searchNewsComment']);
Route::get('admin-logout',                    [AdminController::class, 'logout']);





//admin panel routes
Route::group(['prefix' => 'admin'], function () {
    //Get routes
    Route::get('login',                                [AdminController::class, 'loginView']);
    Route::get('list-news',                            [AdminController::class, 'listNews']);
    Route::get('edit-news-view/{id}',                  [AdminController::class, 'editNewsView']);
    Route::get('dashboard',                            [AdminController::class, 'viewDashboard']);
    Route::get('create-author',                        [AdminController::class, 'createAuthor']);
    Route::get('edit-author/{id}',                     [AdminController::class, 'viewAuthor']);
    Route::get('list-magazine-articles/{id}',          [AdminController::class, 'listMagazineArticles']);
    Route::get('create-magazine-article/{id}',         [AdminController::class, 'createMagazineArticleView']);
    Route::get('list-author',                          [AdminController::class, 'listAuthor']);
    Route::get('create-article-interview',             [AdminController::class, 'createArticleView']);
    Route::get('list-article-interview',               [AdminController::class, 'listArticleInterview']);
    Route::get('edit-article-interview/{id}',          [AdminController::class, 'editViewArticleInterview']);
    Route::get('create-news',                          [AdminController::class, 'createNewsView']);
    Route::get('create-magazine',                      [AdminController::class, 'createMagazineView']);
    Route::get('edit-magazine-view/{id}',              [AdminController::class, 'editMagazineView']);
    Route::get('list-magazine',                        [AdminController::class, 'listMagazine']);
    Route::get('edit-magazine-article/{id}',           [AdminController::class, 'editMagazineArticleView']);
    Route::get('list-article-interview-comments',      [AdminController::class, 'listArticleInterviewComments']);
    Route::get('list-news-comments',                   [AdminController::class, 'listNewsComments']);
    Route::get('edit-article-interview-comment/{id}',  [AdminController::class, 'editArticleInterviewComment']);
    Route::get('edit-news-comment/{id}',               [AdminController::class, 'editNewsComment']);
    Route::get('article-interview-comment-reply/{id}', [AdminController::class, 'articleCommentReply']);
    Route::get('magazine-comment-list',                [AdminController::class, 'getMagazineComments']);
    Route::get('magzine-comment-search',               [AdminController::class, 'searchMagazineComment']);
    Route::get('edit-mag-comment/{id}',                [AdminController::class, 'editMagazineComment']);
    Route::get('kicker/create/{type}',                 [AdminController::class, 'getCreateKickerView']);
    Route::get('get-kickers',                          [AdminController::class, 'getHindiKickers']);
    Route::get('kickers/list/{type}',                  [AdminController::class, 'getKickersList']);
    Route::get('{type}/hindi/{contentId}',             [AdminController::class, 'getCreateHindiArticleNewsForm']);

    //Post routes
    Route::post('update-magazine-comment',             [AdminController::class, 'updateMagazineComment']);
    Route::post('update-mag-comment-status',           [AdminController::class, 'setMagazineCommentStatus']);
    Route::post('article-comment-reply',               [AdminController::class, 'createArticleCommentReply']);
    Route::post('edit-comment-reply/{replyId}',        [AdminController::class, 'updateArticleCommentReply']);
    Route::post('article-register',                    [AdminController::class, 'createArticle']);
    Route::post('create-news',                         [AdminController::class, 'createNews']);
    Route::post('create-magazine',                     [AdminController::class, 'createMagazine']);
    Route::post('edit-magazine',                       [AdminController::class, 'updateMagazine']);
    Route::post('article-interview-edit',              [AdminController::class, 'editArticleInterview']);
    Route::post('create-magazine-article',             [AdminController::class, 'createMagazineArticle']);
    Route::post('update-magazine-article',             [AdminController::class, 'updateMagazineArticle']);
    Route::post('author-edit',                         [AdminController::class, 'updateAuthor']);
    Route::post('author-register',                     [AdminController::class, 'registerAuthor']);
    Route::post('login-check',                         [AdminController::class, 'loginCheck']);
    Route::post('update-news',                         [AdminController::class, 'updateNews']);
    Route::post('edit-article-interview-comment',      [AdminController::class, 'updateArticleInterviewComment']);
    Route::post('edit-news-comment',                   [AdminController::class, 'updateNewsComment']);
    Route::post('delete-article-slider-image',         [AdminController::class, 'deleteArticleSliderImage']);
    Route::post('create/kicker/{type}',                [AdminController::class, 'insertUpdateKicker']);
    Route::post('delete-kicker',                       [AdminController::class, 'deleteKicker']);
    Route::post('hindi/create',                        [AdminController::class, 'createUpdateHindiArticle']);
    // insights get routes code by gp
    Route::get('create-insights',                      [AdminController::class, 'createinsightsView']);
    Route::get('list-insights',                        [AdminController::class, 'listinsights']);
    Route::get('edit-insights-view/{id}',              [AdminController::class, 'editInsightsView']);
    // insights post routes
    Route::post('/create-insights',                      [AdminController::class, 'createInsights']);
    Route::post('update-insights',                      [AdminController::class, 'updateInsights']);
    Route::post('updateinsightstatus',                  [AdminController::class, 'updateInsightStatus']);
    Route::post('deleteinsights',                       [AdminController::class, 'deleteInsights']);
    // insights post routes end here
    // category and sub category get routes code by gp
    Route::get('cat/create',                      [AdminController::class, 'categoryform']);
    Route::get('subcat/create',                  [AdminController::class, 'subcatform']);
    Route::get('cat/list',                        [AdminController::class, 'catlist']);
    Route::get('subcat/list',                        [AdminController::class, 'subcatlist']);
    Route::get('getSubcategories/{catid}', [AdminController::class, 'getSubcategories']);
    // routes/web.php
    // insights post routes
    Route::post('create/cat',                      [AdminController::class, 'storecat']);
    Route::post('create/subcat',                      [AdminController::class, 'storesubcat']);
    Route::post('delete-category',                 [AdminController::class, 'deleteCat']);
    Route::post('delete-subcategory',                 [AdminController::class, 'deletesubCat']);
});

Route::get('location/{city}',              [BusinessListingController::class, 'listingLocation']);
// INSIGHTS ROUTES START HERE //
Route::middleware('TrailingSlashRedirect')->group(function () {
    Route::get('/search/insights',                      [InsightsController::class, 'insightSearch']);

    Route::group(['prefix' => 'insights'], function () {

        Route::get('author/{slug}',                         [InsightsController::class, 'authordata']);
        Route::get('thanks', function () {
            return view('insights.thanks');
        })->name('insights.thanks');
        Route::post('instasubsribe',                [InsightsController::class, 'instasubsribe']);
        Route::post('newslettersignup',             [InsightsController::class, 'newslettersignup']);
        Route::get('/',                             [InsightsController::class, 'insightshome']);
        Route::get('topstories',                    [InsightsController::class, 'getinsightstories']);
        Route::get('trendstories',                  [InsightsController::class, 'trendstories']);
        Route::get('interviews',                    [InsightsController::class, 'getinsightsinterviews']);
        Route::get('events_reports',                [InsightsController::class, 'geteventsreports']);
        Route::get('tag/{tagslug}',                 [InsightsController::class, 'insightstags']);
        Route::get('{insight_type}/{slug}.{id}',    [InsightsController::class, 'getInsightsDetails']);
        Route::get('{category}/{subcategory}',      [InsightsController::class, 'insightsubcategory']);
        Route::get('industryfocus',                 [InsightsController::class, 'industryfocus']);
        Route::get('{slug}',                        [InsightsController::class, 'insightscategorydata']);
    });
});
Route::get('categoryall',       [StaticPageController::class, 'categoryAll']);
Route::get('search',                                 function () {
    return view('site.google-search-result');
});

Route::get('/content/{slug}', function ($slug) {
    // Split the slug by the last dot (.)
    $parts = explode('.', $slug);

    // Extract the article title and id
    $title = implode('-', array_slice($parts, 0, -1));
    $id = end($parts);

    // Redirect to the new domain
    return redirect("https://www.opportunityindia.com/article/{$title}-{$id}", 301);
});

Route::get('/wellness/{slug}', function ($slug) {
    // Split the slug by the last dot (.)
    $parts = explode('.', $slug);

    // Extract the article title and id
    $title = implode('-', array_slice($parts, 0, -1));
    $id = end($parts);

    // Redirect to the new domain
    return redirect("https://www.opportunityindia.com/article/{$title}-{$id}", 301);
});

Route::get('reload-captcha', [AdviceController::class, 'reloadCaptcha']);

Route::post('/submit-form', [AdviceController::class, 'freeadviceHome'])->name('form.submit');

