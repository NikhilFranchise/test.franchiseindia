<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //$schedule->call('\App\Http\Controllers\TestController@testDrive')->dailyAt('13:24')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@insertLeads')->hourly()->between('7:00', '23:00');
        //$schedule->call('\App\Http\Controllers\CronController@resetDailyFlag')->dailyAt('02:00')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@fixingDangerZonesBrands')->dailyAt('04:00')->timezone('Asia/Kolkata');
	    //$schedule->call('\App\Http\Controllers\CronController@freeFranchisorLeadInsertion')->dailyAt('02:30')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@feedbackMail')->dailyAt('11:30')->timezone('Asia/Kolkata');
        $schedule->call('\App\Http\Controllers\SitemapController@sitemap')->dailyAt('05:48')->timezone('Asia/Kolkata');
       // $schedule->call('\App\Http\Controllers\CronController@getSscArray')->dailyAt('05:00')->timezone('Asia/Kolkata');
        $schedule->call('\App\Http\Controllers\CronController@investorMembershipExpiration')->dailyAt('03:00')->timezone('Asia/Kolkata');
        $schedule->call('\App\Http\Controllers\CronController@expireBrands')->dailyAt('02:49')->timezone('Asia/Kolkata');
        $schedule->call('\App\Http\Controllers\CronController@sendInvestorPaidData')->dailyAt('10:36')->timezone('Asia/Kolkata');
        $schedule->call('\App\Http\Controllers\CronController@weeklyRegistrationReport')->weeklyOn(1,'08:00')->timezone('Asia/Kolkata');
        //$schedule->call('\App\Http\Controllers\CronController@leadVisibilityCron')->dailyAt('10:19')->timezone('Asia/Kolkata');
        $schedule->call('\App\Http\Controllers\CronController@insertLeads')->hourly()->between('7:00', '23:00')->timezone('Asia/Kolkata');
   
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
