<?php
/**
 * Created by PhpStorm.
 * User: vasanthmuthusamy
 * Date: 07-09-2017
 * Time: 11:18
 */
return [
    /*
    |--------------------------------------------------------------------------
    | PayU Merchant Key
    |--------------------------------------------------------------------------
    */

    'merchantKey' => '344760',

    'workingKey' => '15208D7E5FABDCCC3FC14480DBB91A69',

    'accessCode' => 'AVIW03IC84AF89WIFA',

    /*
    |--------------------------------------------------------------------------
    | PayU Default Failure Url
    |--------------------------------------------------------------------------
    */
    'furl' => 'https://www.franchiseindia.com/payment/failure',

    /*
    |--------------------------------------------------------------------------
    | PayU Default Success Url
    |--------------------------------------------------------------------------
    */
    'surl' => 'https://www.franchiseindia.com/payment/success',
    // 'surl' => 'http://127.0.0.1:8000/payment/success',


    /*
    |--------------------------------------------------------------------------
    | PayU Default Cancel Url
    |--------------------------------------------------------------------------
    */
    'curl' => 'https://www.franchiseindia.com/payment/cancelled',
    // 'curl' => 'http://127.0.0.1:8000/payment/cancelled',


    /*
    |--------------------------------------------------------------------------
    | PayU Default Cancel Url
    |--------------------------------------------------------------------------
    */
    'baseUrl' => 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction',

    /*
    |--------------------------------------------------------------------------
    | PayU Payment Status
    |--------------------------------------------------------------------------
    */
    'paymentStatus' => array(
        'Initiated' => 0,
        'Success'   => 1,
        'Failed'    => 2,
        'Cancelled' => 3,
        'Tampered'  => 4
    )

];