<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaidInvestor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $companyName;
    protected $managerName;
    protected $email;
    protected $mobile;
    protected $state;
    protected $city;

    public function __construct($details)
    {
        $this->companyName = $details['companyName'];
        $this->managerName = $details['managerName'];
        $this->email       = $details['email'];
        $this->mobile      = $details['mobile'];
        $this->state       = $details['state'];
        $this->city        = $details['city'];
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
                    ->subject('Application Successful at FranchiseIndia.com')
                    ->view('mail.paidinvestor')
                    ->with([
                            'companyName' => $this->companyName,
                            'managerName' => $this->managerName,
                            'email'       => $this->email,
                            'mobile'      => $this->mobile,
                            'state'       => $this->state,
                            'city'        => $this->city
                        ]);
    }
}
