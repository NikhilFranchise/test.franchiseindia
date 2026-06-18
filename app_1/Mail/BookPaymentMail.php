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

class BookPaymentMail extends Mailable
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
        $this->orderId   = $payMailArr['orderId'];
        $this->name      = $payMailArr['name'];
        $this->email     = $payMailArr['email'];
        $this->mobile    = $payMailArr['mobile'];
        $this->address   = $payMailArr['address'];
        $this->amount    = $payMailArr['amount'];
        $this->details   = $payMailArr['details'];
        $this->payStatus = $payMailArr['payStatus'];
        $this->payDate   = $payMailArr['payDate'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@franchiseindia.com')
            ->cc('rvishnu@franchiseindia.net')
            ->cc('sachin@franchiseindia.com')
            ->cc('ashita@franchiseindia.com')
            ->subject('Payment received through HDFC PG - www.FranchiseIndia.com')
            ->view('mail.BookPayment')
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
