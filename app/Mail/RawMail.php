<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RawMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $mailDatra;
    protected $mailheader;
    public function __construct($data,$mailheader)
    {
        $this->mailDatra = $data;
        $this->mailheader = $mailheader;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->mailheader['attachment']!=''){
            return $this->from($this->mailheader['from'])
                ->subject($this->mailheader['subject'])
                ->attach($this->mailheader['attachment'])
                ->view('mail.rawmail')
                ->with(['mailDatra' => $this->mailDatra]);
        } else{
            return $this->from($this->mailheader['from'])
                ->subject($this->mailheader['subject'])
                ->view('mail.rawmail')
                ->with(['mailDatra' => $this->mailDatra]);
        }


    }
}
