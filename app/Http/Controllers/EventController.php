<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{
    //
    public function event()
    {

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://melete.franchiseindia.com/api/franchise-home-videos-and-events',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,

			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);


		$event = json_decode($response, true);

        $events = $event['events'];

		 return view('static.event-new')->with(compact('events'));



    }

}
