<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertleadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $category;
    protected $brandName;

    public function __construct($data)
    {
        $this->category  = $data[0];
        $this->brandName = $data[1];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    ->subject('Brand suggestion - FranchiseIndia')
                    ->view('mail.lead-insert-mail')
                    ->with([
                        'category'  => $this->category,
                        'brandName' => $this->brandName
                    ]);
    }
}
