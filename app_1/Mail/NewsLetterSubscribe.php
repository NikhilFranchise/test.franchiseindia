<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetterSubscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $code;

    public function __construct($scode)
    {
        $this->code = $scode;
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
                    ->view('mail.newsletter')
                    ->subject('Newsletter Subscription | Franchise India')
                    ->with([
                            'code' => $this->code                         
                        ]);
    }
}
