<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $url;
    protected $artName;

    public function __construct($data)
    {
        $this->name  = $data[0];
        $this->url = $data[1];
        $this->artName = $data[2];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
            ->subject('Reply from Franchise India.')
            ->view('mail.CommentReply')
            ->with([
                'name'  => $this->name,
                'url' => $this->url,
                'artName' => $this->artName
            ]);
    }
}
