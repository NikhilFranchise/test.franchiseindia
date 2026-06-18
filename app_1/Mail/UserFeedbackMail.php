<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserFeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $email;
    protected $Phone;
    protected $userType;
    protected $address;
    protected $topic;
    protected $feedback;

    public function __construct($details)
    {
        $this->name           = $details['name'];
        $this->email          = $details['email'];
        $this->Phone          = $details['mobile'];
        $this->userType       = $details['id_type'];
        $this->address        = $details['address'];
        $this->topic          = $details['topic'];
        $this->feedback       = $details['feedback'];
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
                    ->subject("$this->userType - Feedback")
                    ->view('mail.UserFeedback')
                    ->with(['name'          => $this->name,
                            'email'         => $this->email,
                            'phone'         => $this->Phone,
                            'address'       => $this->address,
                            'topic'         => $this->topic,
                            'feedback'      => $this->feedback
                        ]);
    }
}
