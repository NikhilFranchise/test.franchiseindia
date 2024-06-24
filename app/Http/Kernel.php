<?php

namespace App\Http;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Controllers\SitemapController;
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'invAuth' => \App\Http\Middleware\InvAuth::class,
        'franAuth' => \App\Http\Middleware\franAuth::class,
        'ContentAdmin' => \App\Http\Middleware\ContentAdmin::class,


    ];


    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //$schedule->call('\App\Http\Controllers\TestController@testDrive')->dailyAt('13:24')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@insertLeads')->hourly()->between('7:00', '23:00');
        //$schedule->call('\App\Http\Controllers\CronController@resetDailyFlag')->dailyAt('02:00')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@fixingDangerZonesBrands')->dailyAt('04:00')->timezone('Asia/Kolkata');
	    //$schedule->call('\App\Http\Controllers\CronController@freeFranchisorLeadInsertion')->dailyAt('02:30')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@feedbackMail')->dailyAt('11:30')->timezone('Asia/Kolkata');
        $schedule->call([SitemapController::class, 'sitemap'])->dailyAt('05:48')->timezone('Asia/Kolkata');
       // $schedule->call('\App\Http\Controllers\CronController@getSscArray')->dailyAt('05:00')->timezone('Asia/Kolkata');
      
      //stop for some time pankaj
       
      
    //    $schedule->call(\App\Http\Controllers\CronController::class, 'investorMembershipExpiration')->dailyAt('03:00')->timezone('Asia/Kolkata');
    //    $schedule->call(\App\Http\Controllers\CronController::class, 'expireBrands')->dailyAt('02:49')->timezone('Asia/Kolkata');
    //    $schedule->call(\App\Http\Controllers\CronController::class, 'sendInvestorPaidData')->dailyAt('10:36')->timezone('Asia/Kolkata');
    //    $schedule->call(\App\Http\Controllers\CronController::class, 'weeklyRegistrationReport')->weeklyOn(1,'08:00')->timezone('Asia/Kolkata');
    //    $schedule->call(\App\Http\Controllers\CronController::class, 'insertLeads')->hourly()->between('7:00', '23:00')->timezone('Asia/Kolkata');
       
       ///end stop
       
       
       
       //$schedule->call('\App\Http\Controllers\CronController@leadVisibilityCron')->dailyAt('10:19')->timezone('Asia/Kolkata');
    
    
    }
}
