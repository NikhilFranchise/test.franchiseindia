<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdvertiseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $id;
    protected $name;
    protected $email;
    protected $mobile;
    protected $city;
    protected $companyName;

    public function __construct($data)
    {
        $this->name        = $data[0];
        $this->email       = $data[1];
        $this->mobile      = $data[2];
        $this->id          = $data[3];
        $this->companyName = $data[4];
        $this->city        = $data[5];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    ->subject('Advertise')
                    ->view('mail.advertise')
                    ->with([
                            'id'          => $this->id,
                            'name'        => $this->name,
                            'email'       => $this->email,
                            'mobile'      => $this->mobile,
                            'city'        => $this->city,
                            'companyName' => $this->companyName
                        ]);
    
    }
}
