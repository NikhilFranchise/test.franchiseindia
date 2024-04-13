<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class international extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $fid;
    protected $companyName;
    protected $email;
    protected $address;
    protected $ceoName;
    protected $mobile;
    protected $manager;
    public function __construct($companyData)
    {
        $this->fid         = $companyData['fid'];
        $this->companyName = $companyData['companyName'];
        $this->email       = $companyData['email'];
        $this->address     = $companyData['address'];
        $this->ceoName     = $companyData['ceoName'];
        $this->mobile      = $companyData['mobile'];
        $this->manager     = $companyData['manager'];
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
                    ->subject('International enquiry generated at FranchiseIndia.com')
                    ->view('mail.serviceTeam')
                    ->with([
                            'fid'         => $this->fid,
                            'companyName' => $this->companyName,
                            'email'       => $this->email,
                            'address'     => $this->address,
                            'ceoName'     => $this->ceoName,
                            'mobile'      => $this->mobile,
                            'manager'     => $this->manager,
                            
                        ]);
    }
}
