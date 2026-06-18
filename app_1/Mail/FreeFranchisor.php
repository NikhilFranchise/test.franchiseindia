<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeFranchisor extends Mailable
{
    use Queueable, SerializesModels;

    protected $franName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->franName = $name;
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
                    ->subject('you have received an enquiry at FranchiseIndia.com.')
                    ->view('mail.freefranchisor')
                    ->with(['franName' => $this->franName]);
    }
}
