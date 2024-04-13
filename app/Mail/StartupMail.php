<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StartupMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;

    public function __construct($startupData)
    {
        $this->data = $startupData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
			        ->cc('bpreetima@franchiseindia.net')
			        ->bcc('vasanthmuthusamy@gmail.com') 
                    ->subject('Startup 2018 Super Hero Talent Hunt Registration - Lead')
                    ->view('mail.startupMail')
                    ->with([
                            'data' => $this->data,
                        ]);
    
    }
}
