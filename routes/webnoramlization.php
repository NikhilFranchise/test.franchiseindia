<?php

use Illuminate\Support\Facades\Route;
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
use Illuminate\Http\Request;

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

    Route::get('/',                                 [NewHomePageController::class, 'homeNew']);
    Route::get('home',                                   function() { return redirect('/', 301);});
    Route::get('/hi',                               [NewHomePageController::class, 'hindiHomePage']);
    Route::get('about',                             [StaticPageController::class, 'aboutus']);
    Route::get('contact',                           [ContactUsController::class, 'contactUsForm']);
    Route::get('feedback',                          [SiteFeedbackController::class, 'feedbackForm']);
    Route::get('testimonials',                      [StaticPageController::class, 'getTestimonials']);
    Route::get('terms',                             [StaticPageController::class, 'mainTerm']);
    Route::get('getcitylistBystatename',            [CommonController::class, 'getCityListBystateName']);
    Route::get('invester-verifyformmobilenumber',   [MobileVerificationController::class, 'investerverifyMobile']);
    Route::get('/user/check-mobile-status',         [CommonController::class, 'verifyMobile']);
    Route::get('verifyformmobilenumber',            [MobileVerificationController::class, 'verifyMobile']);
    Route::get('/user/investor-mobile-verify',      [CommonController::class, 'investormobileverify']);
    Route::get('validate-email',                    [CommonController::class, 'emailValidation']);
    Route::get('thanks-advice-form', function () { return view('thanks.advice-form'); });
    Route::get('property-loan',                     [StaticPageController::class, 'getPropertyLoanForm']);
    Route::get('getpincode',                        [CommonController::class, 'getPincodeDetails']);
    Route::get('get-city-list-landing-page',        [CommonController::class, 'getCityListLandingPage']);
    Route::get('getsubcategory',                    [CommonController::class, 'getSubCategory']);
    Route::get('getsubcatcategory',                 [CommonController::class, 'getSubCatCategory']);
    Route::get('getcitylist',                       [CommonController::class, 'getCityList']);
    Route::get('most-visitedbrands',                [BrandFilterController::class, 'topbrands']);
    Route::get('brands/{profileName}',              [BrandController::class, 'brandDetails']);
    Route::get('check-existing-registration',        [InvestorController::class, 'checkInvestorExistence']);
    Route::get('mobcheck',                          [MobileVerificationController::class, 'mobCheck']);
    Route::get('get-city-list-landing-page',        [CommonController::class, 'getCityListLandingPage']);
    Route::get('compare-brands',                    [BrandCompareController::class, 'compareBrands']);
    Route::get('get-brands',                        [BrandCompareController::class, 'getComparableBrands']);
    Route::get('/get-brand-compare',                [BrandCompareController::class, 'getSingleBrand']);
    // post routes
    Route::post('property-loan-submit',             [StaticPageController::class, 'postPropertyLoanForm']);
    Route::post('contact-submit',                   [ContactUsController::class, 'contact']);
    Route::post('feedback',                         [FeedbackController::class, 'feedback']);
    Route::post('freeadvice',                       [AdviceController::class, 'freeadvice']);
    Route::post('brandlikes',                       [BrandController::class, 'likes']);
    Route::post('brandratings',                     [BrandController::class, 'ratings']);
    Route::post('brandcontactinfo',                 [ExpressInstaController::class, 'brandInfo']);     //guest
    Route::post('compare-brands',                   [BrandCompareController::class, 'compareBrands']);
    Route::get('login',                             [LoginController::class, 'showLoginForm']);
    Route::get('loginform',                         [LoginController::class, 'showLoginForm'])->name('franchise.login');
    Route::post('loginform',                        [LoginController::class, 'login'])->name('franchise.login.submit');
    Route::get('logoutprofile',                     [LoginController::class, 'logoutProfile']);
    Route::get('fibl/login',                        [LoginController::class, 'fiblLogin']);  // FIBL brand routes
    Route::post('fibl/login',                        [LoginController::class, 'fiblLoginCheck']);
    Route::post('getfreeinfo',                      [ExpressInstaController::class, 'freeInfo']);      //guest

Route::group(['prefix' => 'investor'], function() {
    Route::get('plan',                          [InvestorController::class, 'campaignPlan']);
    Route::get('create-new',                    [InvestorController::class, 'campaignNewRegistration']);
    Route::get('verifyotp',                     [CommonController::class, 'vrifyOtp']);
    Route::get('verify-otp',                    [CommonController::class, 'investervrifyOtp']);	
    Route::get('checkmobilestatus',             [CommonController::class, 'verifyMobile']);
    Route::get('create', function() { return view('investor/register/investor-quick-registration');
    });

    // post routes of investor
    Route::post('inv-plan',                     [InvestorController::class, 'upgradeInvestor']);
    Route::post('register',                     [InvestorController::class, 'createInvestor']);
    //myaccount routes for investor
    Route::group( [ 'prefix' => 'myaccount' ], function() {
     //Get routes
     Route::get('dashboard',          [InvestorController::class,'viewDashboard']);
     Route::get('expressed-interest', [InvestorController::class,'expressInterest']);
     Route::get('responsemanager',    [InvestorController::class,'responseManager']);
     Route::get('payment',            [InvestorController::class,'paymentPlan']);
     Route::get('viewprofile',        [InvestorController::class,'viewprofile']);
     Route::get('recommendations',    [InvestorController::class,'getRecommendations']);
     Route::get('personaldetails',    [InvestorController::class,'showPersonalDetails']);
     Route::get('propertydetails',    [InvestorController::class,'showPropertyDetails']);
     Route::get('jobdetails',         [InvestorController::class,'showJobDetails']);
     Route::get('businessdetails',    [InvestorController::class,'showBusinessDetails']);
     Route::get('investmentdetails',  [InvestorController::class,'showinvestmentdetails']);
     Route::get('matchalert',         [InvestorController::class,'showMatchAlert']);
     Route::get('changepassword',     [InvestorController::class,'showPassword']);
     Route::get('feedback',           [InvestorController::class,'showFeedback']);
     Route::get('advertisewithus',           function() {return view('investor/myAccount/advertisewithus');});

     //Post routes
     Route::post('updatepersonaldetails',   [InvestorController::class,'updatePersonalDetails']);
     Route::post('updatepropertydetails',   [InvestorController::class,'updatePropertyDetails']);
     Route::post('updatebusinessdetails',   [InvestorController::class,'updateBusinessDetails']);
     Route::post('updatejobdetails',        [InvestorController::class,'updateJobDetails']);
     Route::post('updateinvestmentdetails', [InvestorController::class,'updateinvestmentdetails']);
     Route::post('updatepassword',          [InvestorController::class,'updatePassword']);
     Route::post('updatematchalert',        [InvestorController::class,'updateMatchAlert']);
     Route::post('feedback',                [FeedbackController::class,'feedback']);
 });
});

// Franchisor routes
    Route::get('franchisorregistration',                function () {
    return redirect('franchisor/registration/step/1'); });
    Route::get('franchisor/registration/step/{step}',   [FranchisorController::class, 'viewFranchisorRegistrationForm']);
    Route::post('franchisor/registration/step/2',       [FranchisorController::class, 'firstStepSubmit']);
    Route::post('franchisor/registration/step/3',       [FranchisorController::class, 'secondStepSubmit']);
    Route::post('franchisor/registration/step/4',       [FranchisorController::class, 'thirdStepSubmit']);
    Route::post('franchisor/registration/step/5',       [FranchisorController::class, 'fourthStepSubmit']);
    Route::post('franchisor/registration/step/6',       [FranchisorController::class, 'planSubmit']);
    Route::post('franchisor/registration/plan',         [FranchisorController::class, 'fifthStepSubmit']);
    Route::post('franchisor/registration/step/final',   [FranchisorController::class, 'finalStepSubmit']);
    Route::get('advertise-with-us-payment',             [FranchisorController::class, 'advertisewithuspayment']);
    Route::post('advertise-with-us-payment',            [FranchisorController::class, 'advertisewithussubmit']);
// franchisor routes
Route::group( [ 'prefix' => 'franchisor' ], function() {
    Route::get('verifyotp',               [CommonController::class, 'vrifyOtp']);
    Route::get('checkmobilestatus',       [CommonController::class, 'verifyMobile']);

    Route::group( [ 'prefix' => 'myaccount' ], function(){
    Route::get('dashboard',         [FranchisorController::class, 'viewDashboard']);
    Route::get('view-profile',      [FranchisorController::class, 'viewProfile']);
    Route::get('insta-response',    [FranchisorController::class, 'instaResponse']);
    Route::get('expressed-interest', [FranchisorController::class, 'expressInterest']);
    Route::get('businessdetails',    [FranchisorController::class, 'viewBusinessDetails']);
    Route::get('professionaldetails', [FranchisorController::class, 'viewProfessionalDetails']);
    Route::get('propertydetails',     [FranchisorController::class, 'viewPropertyDetails']);
    Route::get('training-aggrement-details', [FranchisorController::class, 'viewTrainingAgreement']);
    Route::get('payment-plan',             [FranchisorController::class, 'paymentPlan']);
    Route::get('appearance',               [FranchisorController::class, 'appearance']);
    Route::get('logo',                     [FranchisorController::class, 'franPhotoChange']);
    Route::get('responsemanager',          [FranchisorController::class, 'viewResponseManager']);
    Route::get('advertisewithus',          function() {return view('franchisor/myAccount/advertisewithus');});
    Route::get('changepassword',           function() {return view('franchisor/myAccount/changepassword');} );

    Route::post('updatepassword',           [FranchisorController::class, 'updatePassword']);
    Route::post('fran-photochange',         [FranchisorController::class, 'franPhotoUpload'])->name('fran.photochange');
    Route::post('updatebusinessdetails',    [FranchisorController::class, 'updateBusinessDetails']);
    Route::post('updateprofessionaldetails', [FranchisorController::class, 'updateProfessionalDetails']);
    Route::post('updatepropertydetails',      [FranchisorController::class, 'updatePropertyDetails']);
    Route::post('updatetrainingaggrementdetails', [FranchisorController::class, 'updateTrainingAgreement']);

    });
});
Route::group( [ 'prefix' => 'business-opportunities' ], function()
{
    // Route::get('dealers-and-distributors.m5',   function() { return redirect('https://dealer.franchiseindia.com/', 301);});	
    // Route::get('education-supplies.sc269',      function() { return redirect('business-opportunities/education-services.sc269', 301);});
    // Route::get('food',                          function() { return redirect('business-opportunities/food-and-beverage.m2', 301);});
    // Route::get('accessories',                   function() { return redirect('business-opportunities/automobile-accessories.ssc262', 301);});
    // Route::get('Others',                        function() { return redirect('business-opportunities/others-dealers-and-distributors.ssc126', 301);});
    // Route::get('bakery',                        function() { return redirect('business-opportunities/bakery-sweets-and-ice-cream.sc424', 301);});
    // Route::get('lowcost205',                    function() { return redirect('business-opportunities/lowcost', 301);});
    // Route::get('retail/',                       function() { return redirect('business-opportunities/retail.m9', 301);});
    // Route::get('.ssc243',                       function() { return redirect('business-opportunities/designer-wear.ssc243', 301);});
    // Route::get('.ssc198',                       function() { return redirect('business-opportunities/stationery-stores.ssc198', 301);});
    // Route::get('food-marts',                    function() { return redirect('business-opportunities/food-and-beverage.sc16', 301);});
    // Route::get('retail-Franchise',              function() { return redirect('business-opportunities/retail.m9', 301);});
    // Route::get('health-care',                   function() { return redirect('business-opportunities/health-care.sc14', 301);});
    // Route::get('Florists-Franchise/',           function() { return redirect('business-opportunities/florists.ssc207', 301);});
    // Route::get('.m1',                           function() { return redirect('business-opportunities/beauty-and-health.m1', 301);});
    // Route::get('.ssc127',                       function() { return redirect('business-opportunities/courier-and-delivery.ssc127', 301);});
    // Route::get('.ssc156',                       function() { return redirect('business-opportunities/matrimonial.ssc156', 301);});
    // Route::get('.ssc110',                       function() { return redirect('business-opportunities/digital-media-and-internet-marketing.ssc110', 301);});
    // Route::get('direct-selling',                function() { return redirect('business-opportunities/direct-selling.ssc293', 301);});
    // Route::get('consulting-Franchise',          function() { return redirect('business-opportunities/consulting-services.ssc300', 301);});
    // Route::get('Automotive-Franchise',          function() { return redirect('business-opportunities/automotive.m8', 301);});
    // Route::get('.ssc184',                       function() { return redirect('business-opportunities/photography.ssc184', 301);});
    // Route::get('.ssc90',                        function() { return redirect('business-opportunities/online-coaching.ssc90', 301);});
    // Route::get('.sc15',                         function() { return redirect('business-opportunities/hotels-and-resorts.sc15', 301);});
    // Route::get('.ssc225',                       function() { return redirect('business-opportunities/kids-wear.ssc225', 301);});
    // Route::get('.ssc130',                       function() { return redirect('business-opportunities/security-services.ssc130', 301);});
    // Route::get('.LOC1',                         function() { return redirect('business-opportunities/andhra-pradesh.LOC1', 301);});
    // Route::get('Jewellery-Franchise',           function() { return redirect('business-opportunities/jewellery.sc42', 301);});
    // Route::get('clothing-Franchise/',           function() { return redirect('business-opportunities/clothing.sc40', 301);});
    // Route::get('mbo-clothing-Franchise',        function() { return redirect('business-opportunities/clothing.sc40', 301);});
    // Route::get('opticians-eye-wear',            function() { return redirect('business-opportunities/opticians-eye-wear.ssc246', 301);});
    // Route::get('franchises-under-50Lac',        function() { return redirect('business-opportunities/franchises-under-50lac', 301);});
    // Route::get('franchises-under-30Lac',        function() { return redirect('business-opportunities/franchises-under-30lac', 301);});
    // Route::get('GFAI-Franchise',                function() { return redirect('business-opportunities/all/all', 301);});
    // Route::get('Tanclean-Franchise',            function() { return redirect('business-opportunities/all/all', 301);});
    // Route::get('/',                             function(){return redirect('business-opportunities/all/all', 301);});

    Route::get('all/all',                          [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('franchises-{price_range}',         [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('tamilnadu.{state_code}',           [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('telangana.{state_code}',           [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('andaman-and-nicobar.{state_code}', [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('maharashtra.{state_code}',         [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('delhi.{state_code}',               [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('karnataka.{state_code}',           [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('west-bengal.{state_code}',         [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('gujarat.{state_code}',             [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('uttar-pradesh.{state_code}',       [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('madhya-pradesh.{state_code}',      [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('haryana.{state_code}',             [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('rajasthan.{state_code}',           [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('andhra-pradesh.{state_code}',      [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('kerala.{state_code}',              [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('punjab.{state_code}',              [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('chandigarh.{state_code}',          [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('arunachal-pradesh.{state_code}',   [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('assam.{state_code}',               [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('bihar.{state_code}',               [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('chhattisgarh.{state_code}',        [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('daman-and-diu.{state_code}',       [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('goa.{state_code}',                 [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('jharkhand.{state_code}',           [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('lakshadweep.{state_code}',         [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('manipur.{state_code}',             [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('meghalaya.{state_code}',           [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('mizoram.{state_code}',             [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('nagaland.{state_code}',            [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('odisha.{state_code}',              [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('pondicherry.{state_code}',         [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('sikkim.{state_code}',              [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('tripura.{state_code}',             [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('uttarakhand.{state_code}',         [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('himachal-pradesh.{state_code}',    [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('jammu-and-kashmir.{state_code}',   [BusinessListingController::class, 'searchBusinessListing']);

    Route::get('{searchTerm}.FT{ftype}',                    [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{categoryIds}',                [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{categoryIds}/{locationIds}',   [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}',   [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('{searchTerm}/{franchiseType}/{categoryIds}/{locationIds}/{range}',   [BusinessListingController::class, 'searchBusinessListing']);
//     Route::get('{catUrl}.{category_param}', function(Request $request,$catUrl, $category_param) {
//         preg_match_all('/\d+/', $category_param, $matches);
//         $allIntegers = implode('', $matches[0]);

//         // dd($catUrl,$category_param,$allIntegers);
//         $seoCategoriesm = Config('category.SeoCategoryArr'); // Corrected variable name
//         $seoCategoriessc = Config('category.SeoSubCategoryArr'); // Corrected variable name
//         $seoCategoriesssc = Config('category.SeoSubSubCategoryArr'); // Corrected variable name
//         // dd($catUrl, $category_param,$allIntegers,$seoCategoriesssc);

// // Check if $allIntegers exists in $seoCategoriesm configuration array
//         if (array_key_exists($allIntegers, $seoCategoriesm)) {
//             // If $allIntegers exists in $seoCategoriesm, add "m" to $allIntegers
//             $allIntegers = 'm' . $allIntegers;
//             if(strpos($allIntegers, "m") !== false){    
//             // dd($allIntegers);
//                 $category = substr($allIntegers, 1, 3);
//                 // dd($allIntegers,$category);
//                 $configCatUrl = Config('category.SeoCategoryArr.'.$category);
//                 // dd($configCatUrl);
//                 $newCatUrl = '/business-opportunities/'.$configCatUrl . '.' . $allIntegers;
//                 // dd($newCatUrl);
//                 $oldCaturl='/business-opportunities/'.$catUrl . '.' . $category_param;
//                 // dd($oldCaturl);
//                 // dd($category,$configCatUrl,$newCatUrl, $oldCaturl);
//                 if ($configCatUrl !== false) {
//                     $newCatUrl = '/business-opportunities/'.$configCatUrl . '.' . $allIntegers;
//                     if ($newCatUrl != $oldCaturl ) {
//                         // dd($newCatUrl);
//                         return redirect($newCatUrl);
//                     }
//                 }
//             }        
//         }
//         else if (array_key_exists($allIntegers, $seoCategoriessc)) {
//             // If $allIntegers exists in $seoCategoriesm, add "m" to $allIntegers
//             $allIntegers = 'sc' . $allIntegers;
//             // dd($allIntegers);

//             if(strpos($allIntegers, "sc") !== false){    
//             // dd($allIntegers);
//                 $category = substr($allIntegers, 2, 3);
//                 // dd($allIntegers,$category);
//                 $configCatUrl = Config('category.SeoSubCategoryArr.'.$category);
//                 // dd($configCatUrl);
//                 $newCatUrl = '/business-opportunities/'.$configCatUrl . '.' . $allIntegers;
//                 // dd($newCatUrl);
//                 $oldCaturl='/business-opportunities/'.$catUrl . '.' . $category_param;
//                 // dd($oldCaturl);
//                 // dd($category,$configCatUrl,$newCatUrl, $oldCaturl);
//                 if ($configCatUrl !== false) {
//                     $newCatUrl = '/business-opportunities/'.$configCatUrl . '.' . $allIntegers;
//                     if ($newCatUrl != $oldCaturl ) {
//                         // dd($newCatUrl);
//                         return redirect($newCatUrl);
//                     }
//                 }
//             }        
//         }

//         else if (array_key_exists($allIntegers, $seoCategoriesssc)) {
//             // If $allIntegers exists in $seoCategoriesm, add "m" to $allIntegers
//             $allIntegers = 'ssc' . $allIntegers;
//             // dd($allIntegers);

//             if(strpos($allIntegers, "ssc") !== false){    
//             // dd($allIntegers);
//                 $category = substr($allIntegers, 3, 4);
//                 // dd($allIntegers,$category);
//                 $configCatUrl = Config('category.SeoSubSubCategoryArr.'.$category);
//                 // dd($configCatUrl);
//                 $newCatUrl = '/business-opportunities/'.$configCatUrl . '.' . $allIntegers;
//                 // dd($newCatUrl);
//                 $oldCaturl='/business-opportunities/'.$catUrl . '.' . $category_param;
//                 // dd($oldCaturl);
//                 // dd($category,$configCatUrl,$newCatUrl, $oldCaturl);
//                 if ($configCatUrl !== false) {
//                     $newCatUrl = '/business-opportunities/'.$configCatUrl . '.' . $allIntegers;
//                     if ($newCatUrl != $oldCaturl ) {
//                         // dd($newCatUrl);
//                         return redirect($newCatUrl);
//                     }
//                 }
//             }        
//         }
//         else{
//             $defaultUrl = 'business-opportunities/all/all';
//             return redirect($defaultUrl);
//         }
//             // Call the controller function if no redirection needed
//             return app()->call([app(BusinessListingController::class), 'getBusinessListing']);
//         });

    
    
    Route::get('{catUrl}.{category_param}',        [BusinessListingController::class, 'getBusinessListing']);    
    Route::get('{lowcost}',                        [BusinessListingController::class, 'searchBusinessListing']);
    // Route::get('{lowcost}',function(Request $request,$lowcost){
    //     $url = $request->url();
    //     // dd($url,$lowcost);

    //     preg_match_all('/\d+$/', $lowcost, $matches); // Match all integers at the end of $lowcost
    //      $lastIntegers = end($matches[0]); // Get the last set of integers
    //      $seoCategoriesm = Config('category.SeoCategoryArr'); // Corrected variable name
    //      $seoCategoriessc = Config('category.SeoSubCategoryArr'); // Corrected variable name
    //      $seoCategoriesssc = Config('category.SeoSubSubCategoryArr'); // Corrected variable name

    //      //  dd($lastIntegers,$seoCategories);
    //      if (array_key_exists($lastIntegers, $seoCategoriesm)) {
            
    //         $category = $seoCategoriesm[$lastIntegers];
    //         // dd($category);
    //         $newUrl = '/business-opportunities/' . $category . '.'.'m' . $lastIntegers;
    //         return redirect($newUrl);
         
    //     }
    //     else if (array_key_exists($lastIntegers, $seoCategoriessc)) {
    //         $category = $seoCategoriessc[$lastIntegers];
    //         $newUrl = '/business-opportunities/' . $category . '.'.'sc' . $lastIntegers;
    //         return redirect($newUrl);
    //     }
    //     else if (array_key_exists($lastIntegers, $seoCategoriesssc)) {
    //         $category = $seoCategoriesssc[$lastIntegers];
    //         // dd($category);
    //         $newUrl = '/business-opportunities/' . $category . '.'.'ssc' . $lastIntegers;
    //         return redirect($newUrl);
    //     }
    //     else{
    //         $defaultUrl = 'business-opportunities/all/all';
    //         return redirect($defaultUrl);
    //     }
       
    
    //     //  dd($url, $lastIntegers,$configCatUrl);
         
        
    //      return app()->call([app(BusinessListingController::class), 'searchBusinessListing']);
    // });

    // Route::get('{lowcost}',function($lowcost){
    //     return redirect()->route('businessListing','all/all');
    // })->where('lowcost','.*')->name('businessListing');
    
    
    // Route::get('{code}/all/all',             function(){return redirect('business-opportunities/all/all', 301);});
    // Route::get('all/{code}/all/',            function(){return redirect('business-opportunities/all/all', 301);});
});

// /Category Page Routes
Route::group( [ 'prefix' => 'category' ], function()
{
    Route::get('atoz',         [BusinessListingController::class, 'searchBusinessListing'] );
    Route::get('search',       [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('searchby',     [BusinessListingController::class, 'searchBusinessListing']);
    Route::get('index',        function(){return redirect('business-opportunities/all/all', 301);});
});
