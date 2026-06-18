<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Events;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    //
    public function event(Request $request)
    {
        $cacheKey = 'events_cache'; // Define a single cache key for events
        $cacheExpiration = 3600; // 1 hour
        // Check if events data exists in the cache
        $events = Cache::remember($cacheKey, $cacheExpiration, function () use ($request) {
            $eventdata = $request->input('events', ''); // Use input method for better readability
            // Fetch upcoming or all events based on request
            $query = Events::query()->select(
                'fih_title as title',
                'fih_url as url',
                'fih_imageurl as image',
                'fih_displaydate as date',
                'fih_startdate as start_date',
                'fih_date as endDate',
                'fih_address as venue',
                'fih_mobile as contact',
                'fih_homepage as isDisplayOnHome',
                'fih_facebook as facebook',
                'fih_twitter as twitter',
                'fih_linkedin as linkedin',
                'instagram_url as instagram',
                'youtube_url as youtube',
                'fih_status as priority',
                'show_website'
            );
            // Apply conditions based on request
            if ($eventdata === 'upcoming') {
                $query->where('fih_status', 1)
                    ->where('fih_date', '>=', DB::raw('CURDATE()'));
            }

            return $query->orderBy('fih_date', 'ASC')->get()->toArray();
        });

        // Return view with cached events data
        return view('static.event-new')->with(compact('events'));
    }

    public static function getEvents()
    {
        $events = Events::query()
            ->select(
                'fih_url as url',
                'fih_title as title',
                'fih_displaydate as date',
                'fih_address as place'
            )->where('fih_status', 1)
            ->where('fih_date', '>=', DB::raw('CURDATE()'))
            ->orderBy('fih_date', 'ASC')
            ->take(5)
            ->get()
            ->toArray();

        return $events;
    }
}
