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

    'merchantKey' => 'yVaVXf',

    /*
    |--------------------------------------------------------------------------
    | PayU Salt
    |--------------------------------------------------------------------------
    */

    'salt' => '5eObJzlZ',

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

    /*
    |--------------------------------------------------------------------------
    | PayU Default Cancel Url
    |--------------------------------------------------------------------------
    */
    'curl' => 'https://www.franchiseindia.com/payment/cancelled',

    /*
    |--------------------------------------------------------------------------
    | PayU Default Cancel Url
    |--------------------------------------------------------------------------
    */
    'baseUrl' => 'https://secure.payu.in/_payment',

    /*
    |--------------------------------------------------------------------------
    | PayU Hash Sequence Pattern
    |--------------------------------------------------------------------------
    */
    'hashSeq' => '%s|%s|%s|%s|%s|%s|||||||||||%s',

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


/*return [

    // For USD
    'transportal_id_usd'  => 'id=79020051',
    'transportal_pwd_usd' => 'transportal_pwd_usd',
    'currencycode_usd'    => 'currencycode=840',
    'TranportalID_usd'    => '<id>79020051</id>',
    'TranportalPWD_usd'   => '<password>79020051</password>',

    // For Indian Rupees
    'transportal_id_inr'  => 'id=70001317',
    'transportal_pwd_inr' => 'password=70001317',
    'currencycode_inr'    => 'currencycode=356',
    'TranportalID_inr'    => '<id>70001317</id>',
    'TranportalPWD_inr'   => '<password>70001317</password>',

     // For Testing
    'test_transportal_id_inr'  => 'id=90000908',
    'test_transportal_pwd_inr' => 'password=password4',
    'test_currencycode_inr'    => 'currencycode=356',
    'test_TranportalID_inr'    => '<id>90000908</id>',
    'test_TranportalPWD_inr'   => '<password>password4</password>',

];*/
