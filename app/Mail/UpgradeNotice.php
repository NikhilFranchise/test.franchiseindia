<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpgradeNotice extends Mailable
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
    protected $imgLink;

    public function __construct($data)
    {
        $this->fid          = $data[0];
        $this->companyName  = $data[1];
        $this->email        = $data[2];
        $this->imgLink      = $data[3];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    ->subject('Reg: Free Franchisor logo upload - alert')
                    ->cc('service@franchiseindia.net')
                    ->view('mail.fran-img-upgrade')
                    ->with(['fid'         => $this->fid,
                            'companyName' => $this->companyName,
                            'email'       => $this->email,
                            'imgLink'      => $this->imgLink
                        ]);
    
    }
}
