<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvestorActivation extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $franData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name     = $data['invName'];
        $this->franData = $data['franData'];
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
                    ->subject('Profile Activation | Franchise India')
                    ->view('mail.investor-profile-activation')
                    ->with([
                            'companyName' => $this->name,
                            'franData' => $this->franData,
                        ]);
    }
}
