<?php
/**
 * Created by PhpStorm.
 * User: vasanthmuthusamy
 * Date: 07-08-2017
 * Time: 13:25
 */
return [
    /*
    |--------------------------------------------------------------------------
    |  Merchant Key
    |--------------------------------------------------------------------------
    */
    'apiKey' => 'cfe63cea013d9f531a8db8f7106766e5ad9dff82a82a4fdeb8e6fb65de274f1e',

    /*
    |--------------------------------------------------------------------------
    | TextLocal API Url
    |--------------------------------------------------------------------------
    */
    'apiUrl' => 'https://api.textlocal.in/send/?',

    /*
    |--------------------------------------------------------------------------
    | TextLocal API Url
    |--------------------------------------------------------------------------
    */
    'sender' => 'FranIn',

    /*
    |--------------------------------------------------------------------------
    | TextLocal API Url
    |--------------------------------------------------------------------------
    */
    'username' => 'tech@businessex.com',

    /*
    |--------------------------------------------------------------------------
    | Franchisor SMS Template
    |--------------------------------------------------------------------------
    */
    'FranPaid' => 'Dear Franchisor, %s(%s) has applied to your opportunity',
    'FranFree' => 'Dear Franchisor, %s has applied to your opportunity',

    /*
    |--------------------------------------------------------------------------
    | Investor SMS Template
    |--------------------------------------------------------------------------
    */
    'InvPaid' => 'Dear %s, You have shown interest in %s (%s). Happy Franchising',
    'InvFree' => 'Dear %s, Thanks for showing interest in %s. Happy Franchising',

    /*
    |--------------------------------------------------------------------------
    | Guest Investor SMS Template
    |--------------------------------------------------------------------------
    */
    'GuestInv' => 'Dear %s, Your response has been submitted',

    /*
    |--------------------------------------------------------------------------
    | OTP SMS Template
    |--------------------------------------------------------------------------
    */
   // 'SmsOtpMsg' => 'Dear %s, your verification code is %s',
    'SmsOtpMsg' => 'Dear %s, Your Franchiseindia.com verification code is %s FRANCHISE INDIA HOLDINGS LIMITED',	

];
