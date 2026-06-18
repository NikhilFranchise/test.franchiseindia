<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',

    ],
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [

        'client_id' => '693166321174131',
        'client_secret' => 'd6c7ecd475ea74ce71f26194d489a7d0',
        'redirect' => 'https://www.franchiseindia.com/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '419712793551-job4lnjbv425s7lqcnkfj8f8m7o2f2f3.apps.googleusercontent.com',
        'client_secret' => 'h2jtjDzljsRqKIQY8eF58RwM',
        'redirect' => 'https://www.franchiseindia.com/auth/google/callback',
    ],

    'linkedin' => [
        'client_id' => '81ua9b72j7ntup',
        'client_secret' => 'kQ26ZJVRngGGZeva',
        'redirect' => 'https://www.franchiseindia.com/auth/linkedin/callback',
    ],
];


