<?php
/**
 * Created by PhpStorm.
 * User: vasanthmuthusamy
 * Date: 20-11-2017
 * Time: 12:02
 */


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstaSubMagazineMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;
    protected $Phone;

    public function __construct($instaSubData)
    {
        $this->email          = $instaSubData['email'];
        $this->Phone          = $instaSubData['mobile'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
                    //->bcc('vasanthmuthusamy@gmail.com')
                    ->subject('Insta Subscribe - TFW')
                    ->view('mail.instaSubscribeMagazine')
                    ->with([
                        'email'         => $this->email,
                        'phone'         => $this->Phone
                    ]);
    }
}
