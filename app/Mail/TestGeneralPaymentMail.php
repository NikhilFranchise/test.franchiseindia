<?php
/**
 * Created by PhpStorm.
 * User: vasanthmuthusamy
 * Date: 02-10-2017
 * Time: 16:34
 */
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestGeneralPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $orderId;
    protected $name;
    protected $email;
    protected $mobile;
    protected $address;
    protected $amount;
    protected $details;
    protected $payStatus;
    protected $payDate;


    public function __construct($payMailArr)
    {
        $this->orderId   = $payMailArr[0]['orderId'];
        $this->name      = $payMailArr[0]['name'];
        $this->email     = $payMailArr[0]['email'];
        $this->mobile    = $payMailArr[0]['mobile'];
        $this->address   = $payMailArr[0]['address'];
        $this->amount    = $payMailArr[0]['amount'];
        $this->details   = $payMailArr[0]['details'];
        $this->payStatus = $payMailArr[0]['payStatus'];
        $this->payDate   = $payMailArr[0]['payDate'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ccFlag = 1;
        //$sendMail =  $this->from('no-reply@franchiseindia.com');
        //if ($this->contreason == 'Subscribe to the Magazine')
        if ($ccFlag == 1)
            $sendMail = $this->cc("vasanthmuthusamy@gmail.com");

        return $this->from('no-reply@franchiseindia.com')
            //->cc('vasanthmuthusamy@gmail.com')
            //->cc('sachin@franchiseindia.com')
            //->cc('ashita@franchiseindia.com')
            ->subject('Payment received through HDFC PG - www.FranchiseIndia.com')
            ->view('mail.generalpayment')
            ->with([
                'orderId'   => $this->orderId,
                'name'      => $this->name,
                'email'     => $this->email,
                'mobile'    => $this->mobile,
                'address'   => $this->address,
                'amount'    => $this->amount,
                'details'   => $this->details,
                'payStatus' => $this->payStatus,
                'payDate'   => $this->payDate,
            ]);

    }
}
