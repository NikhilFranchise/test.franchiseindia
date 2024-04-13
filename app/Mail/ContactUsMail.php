<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $email;
    protected $Phone;
    protected $contreason;
    protected $address;

    public function __construct($details)
    {
        $this->name           = $details['name'];
        $this->email          = $details['email'];
        $this->Phone          = $details['mobile'];
        $this->contreason     = $details['contreason'];
        $this->address        = $details['address'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Mark CC to Anuj if the enquiry is for Magazine
        if ($this->contreason == 'Subscribe to the Magazine')
            $sendMail = $this->cc('subscribe@franchiseindia.net');

        return $this->from('no-reply@franchiseindia.com')
                    ->subject('Contact Us - FranchiseIndia.com')
                    ->view('mail.ContactUs')
                    ->with([
                            'name'          => $this->name,
                            'email'         => $this->email,
                            'phone'         => $this->Phone,
                            'contreason'    => $this->contreason,
                            'address'       => $this->address
                        ]);
    }
}
