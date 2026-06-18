<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Enquirenow extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
        $subject = $this->details->user == "franchisor" ? "Expand My Brand" : "Buy a Franchise";
        return $this->from('no-reply@franchiseindia.com')
                    // ->bcc('techsupport@franchiseindia.com')
                    // ->bcc('cnikhil@franchiseindia.net')
                    ->subject($subject.' enquiry at FranchiseIndia.com')
                    ->view('mail.enquirenow')
                    ->with(['details' => $this->details]);
    }
}
