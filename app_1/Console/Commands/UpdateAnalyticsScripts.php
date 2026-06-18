<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UpdateAnalyticsScripts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:analytics-scripts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download the latest gtag.js and gtm.js files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
          $files = [
            'gtag.js' => 'https://www.googletagmanager.com/gtag/js?id=G-8MKFEZLR18',
            'gtm.js' => 'https://www.googletagmanager.com/gtm.js?id=GTM-NW38FD',
        ];

        foreach ($files as $fileName => $url) {
            $response = Http::get($url);

            if ($response->successful()) {
                Storage::disk('public')->put("js/{$fileName}", $response->body());
                $this->info("{$fileName} updated successfully.");
            } else {
                $this->error("Failed to download {$fileName}.");
            }
        }
    }
    
}
