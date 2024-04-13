<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class confirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $company;
    protected $code;

    public function __construct($companyname)
    {
        $this->company = $companyname['companyName'];
        $this->code    = $companyname['code'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    //->bcc('techsupport@franchiseindia.com')
                    ->subject('Thankyou for registration | Franchise India')
                    ->view('mail.confirmation')
                    ->with([
                            'companyName' => $this->company,
                            'companyCode' => $this->code,
                        ]);
    
    }
}
