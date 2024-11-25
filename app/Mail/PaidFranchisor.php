<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaidFranchisor extends Mailable
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
    protected $city;
    protected $state;
    protected $franName;

    public function __construct($details)
    {
        $this->name           = $details[0]['name'];
        $this->email          = $details[0]['email'];
        $this->Phone          = $details[0]['mobile'];
        $this->city           = $details[0]['city'];
        $this->state          = $details[0]['state'];
        $this->franName       = $details[1];
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
			->subject('you have received an enquiry at FranchiseIndia.com')
			->view('mail.paidfranchisor')
			->with([
				'name'     => $this->name,
				'email'    => $this->email,
				'phone'    => $this->Phone,
				'city'     => $this->city,
				'state'    => $this->state,
				'franName' => $this->franName
			]);
    }
}
