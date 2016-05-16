<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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
        'client_id' => '1714154942180802',
        'client_secret' => '80f9552e31fd8045ba8ac251aa6170b9',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'github' => [
        'client_id' => env('GITHUB_ID'),
        'client_secret' => env('GITHUB_SECRET'),
        'redirect' => env('GITHUB_URL'),
    ],

    'twitter' => [
        'client_id' => 'QXyJBVi0pRsy7kxUwSRQVblLh',
        'client_secret' => 'eNPZ8QX3K1t78WJGA2fSX9KpUDNZD9iBnOuOl8EA22kZETVi89',
        'redirect' => 'http://www.localhost:8000/auth/twitter/callback',
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_ID'),
        'client_secret' => env('LINKEDIN_SECRET'),
        'redirect' => env('LINKEDIN_URL'),
    ],

];
