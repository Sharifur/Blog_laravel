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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
    'client_id' => '1569372003138303',
    'client_secret' => 'e52e2c54c669e5c2de8ac2179673e72b',
    'redirect' => 'http://localhost/blog/public/login-facebook-callback',
],
    'google' => [
    'client_id' => '984737387578-2q7s6ee0ncf77e4249ltvlbn5un2qf32.apps.googleusercontent.com',
    'client_secret' => 'tPYX2fdRspPhC4A4vAuBLhf_',
    'redirect' => 'http://localhost/blog/public/login-google-callback',
],

];
