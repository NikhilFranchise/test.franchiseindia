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
			CURLOPT_URL => 'https://uat.melete.franchiseindia.com/api/franchise-home-videos-and-events',
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
	   
        /*$ch = curl_init('https://uat.melete.franchiseindia.com/api/franchise-home-videos-and-events');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $event = json_decode($result, true);

        $events = $event['events'];*/
//        echo '<pre>';
//        print_r($events);
//        die;
       // return view('static.event-new')->with(compact('events'));
       // return view('static.event-new');	   
    }

}
