<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeInvestor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $companyName;
    protected $investorName;

    public function __construct($data)
    {
        $this->companyName  = $data[0];
        $this->investorName = $data[1];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $returnMail = $this->from('no-reply@franchiseindia.com')->subject('Application successful at FranchiseIndia.com');

        if(request()->user()->membership_type == 1)
            $returnMail = $returnMail->view('mail.PaidInvestorFreeLead');
        else
            $returnMail = $returnMail->view('mail.FreeInvestor');

        return $returnMail->with([
                        'companyName'  => $this->companyName,
                        'investorName' => $this->investorName
                    ]);
    }
}
