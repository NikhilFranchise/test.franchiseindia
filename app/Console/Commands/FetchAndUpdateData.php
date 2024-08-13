<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class FetchAndUpdateData extends Command
{
    protected $signature = 'data:update';
    protected $description = 'Fetch data from API and update JSON file';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $this->fetchAndUpdate('https://www.opportunityindia.com/api/article/apidata', 'oidata/articles.json');
        $this->fetchAndUpdate('https://www.opportunityindia.com/api/article/hindiapidata', 'oidata/articlehindi.json');

    }

    private function fetchAndUpdate($apiUrl, $filePath)
    {
        $currentTimestamp = now();
        $lastUpdate = Cache::get("last_update_$filePath");

        if (!$lastUpdate || $lastUpdate < $currentTimestamp->subHour()) {
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $result = curl_exec($ch);

            // Check HTTP response status
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($result !== false && $httpCode == 200) {
                $data = json_decode($result, true);
                $timestamp = Carbon::now('Asia/Kolkata')->toDateTimeString();
                $data['last_updated'] = $timestamp;

                // Ensure the 'data' directory exists
                if (!file_exists(dirname($filePath))) {
                    mkdir(dirname($filePath), 0755, true);
                }

                // Prepare JSON data with timestamp comment
                $jsonData = [
                    'comment' => 'Last updated on ' . $timestamp,
                    'data' => $data
                ];

                // Write the data to the JSON file
                file_put_contents(public_path($filePath), json_encode($jsonData, JSON_PRETTY_PRINT));

                // Update the cache with the current time
                Cache::put("last_update_$filePath", now());
            } else {
                $this->error('Failed to fetch data from the API or received non-200 status code for ' . $apiUrl);
            }
        }
    }
}
