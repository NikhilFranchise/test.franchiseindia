<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpressInstaVisitorMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $franchisorName;
    protected $visitorName;

    public function __construct($companyname)
    {
        $this->franchisorName = $companyname[0];
        $this->visitorName    = $companyname[1];
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
                    ->subject('Application successful at FranchiseIndia.com')
                    ->view('mail.website-visitor')
                    ->with([
                        'companyName' => $this->franchisorName,
                        'visitorName' => $this->visitorName
                    ]);
    }
}
