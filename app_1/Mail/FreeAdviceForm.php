<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeAdviceForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    { 
        // dd($details);
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->details->optionsRadios == "franchisor" ? "Expand My Brand" : "Buy a Franchise";
        return $this->from('no-reply@franchiseindia.com')
                    ->bcc('techsupport@franchiseindia.com')
                    // ->bcc('cnikhil@franchiseindia.net')
                    ->subject($subject.' enquiry at FranchiseIndia.com')
                    ->view('mail.expand-brand')
                    ->with(['details' => $this->details]);
    }
}
