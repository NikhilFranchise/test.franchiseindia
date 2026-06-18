<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FranchisorFeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $franData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->franData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    ->subject('Franchiseindia.com feedback')
                    ->view('mail.franchisor-email-feedback')
                    ->with(['franData' => $this->franData]);
    }
}
