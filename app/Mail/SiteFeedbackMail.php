<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SiteFeedbackMail extends Mailable
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
    protected $feedbackTopic;
    protected $feedback;
    protected $site;

    public function __construct($details)
    {
        $this->name           = $details['name'];
        $this->email          = $details['email'];
        $this->Phone          = $details['mobile'];
        $this->feedbackTopic  = $details['feedback_topic'];
        $this->feedback       = $details['feedback'];
        $this->site           = $details['site'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    ->bcc('vasanthmuthusamy@gmail.com')
                    ->subject('Site Feedback - FranchiseIndia.com')
                    ->view('mail.SiteFeedback')
                    ->with([
                            'name'          => $this->name,
                            'email'         => $this->email,
                            'phone'         => $this->Phone,
                            'feedbackTopic' => $this->feedbackTopic,
                            'feedback'      => $this->feedback,
                            'site'          => $this->site
                        ]);
    }
}
