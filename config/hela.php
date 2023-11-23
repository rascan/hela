<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default MPesa Application
    |--------------------------------------------------------------------------
    |
    | This is the app that shall be used to facilitate any transaction between
    | Hela and Safaricom's Daraja services. The value provided needs to be
    | one of the apps that have been configured under the 'apps' below.
    |
    */

    'default' => env('MPESA_APP', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Callback URL
    |--------------------------------------------------------------------------
    |
    | This is the callback url that Safaricom will issue a request to once it
    | has finished processing any long running request that has been queued
    | for execution. It can be overriden when making a service call
    |
    */

    'callback' => '/hela/callback',

    /*
    |--------------------------------------------------------------------------
    | MPesa Applications
    |--------------------------------------------------------------------------
    |
    | You can configure all your MPesa apps below. Hela has already configured
    | two apps for you for sandbox and production. Feel free to add more or
    | change the names of the existing ones to suit your own design needs.
    |
    */

    'apps' => [

        'sandbox' => [
            'environment' => 'test',
            'consumer_key' => env('MPESA_CONSUMER_KEY'),
            'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
            'business_short_code' => env('MPESA_BUSINESS_SHORT_CODE', '174379'),
            'passkey' => env('MPESA_PASSKEY', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'),
        ],

        'production' => [
            'environment' => 'live',
            'consumer_key' => env('MPESA_CONSUMER_KEY'),
            'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
            'business_short_code' => env('MPESA_BUSINESS_SHORT_CODE'),
            'passkey' => env('MPESA_PASSKEY'),
        ],

    ],

];
