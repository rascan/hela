<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default MPesa Account
    |--------------------------------------------------------------------------
    |
    | This is the account that shall be used to facilitate any transaction between
    | Hela and Safaricom's Daraja service. The value provided needs to be one
    | of the accounts that have been configured under the 'accounts' below.
    |
    */

    'default' => env('MPESA_ACCOUNT', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | MPesa Accounts
    |--------------------------------------------------------------------------
    |
    | You can configure all your MPesa accounts below. Hela has already configured
    | two accounts for you for sandbox and production. Feel free to add more or
    | change the names of the existing ones to suit your app's design needs
    |
    */

    'accounts' => [

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
