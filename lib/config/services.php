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
        'client_id' => '1577563652342523',
        'client_secret' => '34be9522e5f3d4debd126245a474619b',
        // 'redirect' => 'http://ceduvn.com/auth/facebook/callback',
        'redirect' => 'http://demo2-cgroup.com/errors',
    ],
    
    'github' => [
        'client_id' => env('GITHUB_APP_ID'),
        'client_secret' => env('GITHUB_APP_SECRET'),
        'redirect' => env('GITHUB_APP_CALLBACK_URL'),
    ],
    'twitter' => [
        'client_id' => env('TWITTER_APP_ID'),
        'client_secret' => env('TWITTER_APP_SECRET'),
        'redirect' => env('TWITTER_APP_CALLBACK_URL'),
    ],
    'google' => [
        'client_id' => '135092102718-46cj889n3kjq1bk7d5b53o4b76dub1gc.apps.googleusercontent.com',
        'client_secret' => 'JrElwcihBo6EW9WEMepxxl0x',
        'redirect' => 'http://demo2-cgroup.com/auth/google/callback',

    ],

];
