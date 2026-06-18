<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\StartupMail;
use Illuminate\Support\Facades\Mail;

class StartupEventController extends Controller
{
    //
    public function mailStartup(Request $request) 
    {
        $data[0] = $request->source;
        $data[1] = $request->name;
        $data[2] = $request->company;
        $data[3] = $request->website;
        $data[4] = $request->email;
        $data[5] = $request->phone;
        $data[6] = $request->purpose;
        $data[7] = $request->location;
        $data[8] = $request->category;
        Mail::to("conference@entrepreneurindia.com")->send(new StartupMail($data));
    }
}
