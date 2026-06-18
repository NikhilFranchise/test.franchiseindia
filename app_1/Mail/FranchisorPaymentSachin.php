<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FranchisorPaymentSachin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $franchisorId;
    protected $amount;
    protected $startDate;
    protected $plan;
    protected $contactNo;
    protected $company;
    protected $email;

    public function __construct($franchisorData)
    {
        $this->franchisorId = $franchisorData[1]->franchisor_id;
        $this->amount       = $franchisorData[0];
        $this->startDate    = $franchisorData[1]->activation_date;
        $this->plan         = $franchisorData[4];
        $this->contactNo    = $franchisorData[3]->mobile;
        $this->company      = $franchisorData[1]->company_name;
        $this->email        = $franchisorData[3]->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
            ->bcc('techsupport@franchiseindia.com')
            ->subject('Franchisor Registration')
            ->view('mail.franchisor-registration-sachin')
            ->with([
                'franchisorId' => $this->franchisorId,
                'amount'       => $this->amount,
                'startDate'    => $this->startDate,
                'plan'         => $this->plan,
                'contactNo'    => $this->contactNo,
                'company'      => $this->company,
                'email'        => $this->email
            ]);

    }
}
