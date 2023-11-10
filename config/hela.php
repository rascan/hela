<?php

return [
    /**
     * The base url for MPesa Daraja Service. It defaults to the
     * sandbox if the environment variable is not present
     */
    'base_url' => env('MPESA_BASE_URL', 'https://sandbox.safaricom.co.ke'),

    'consumer_key' => env('MPESA_CONSUMER_KEY'),

    'consumer_secret' => env('MPESA_CONSUMER_SECRET'),

    /**
     * The passkey is a secret key provided by Safaricom upon going live.
     * It defaults to the sandbox's passkey when it is not provided
     */
    'passkey' => env('MPESA_PASSKEY', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'),

    /**
     * The passkey is a secret key provided by Safaricom upon going live.
     * It defaults to the sandbox's passkey when it is not provided
     */
    'business_short_code' => env('MPESA_BUSINESS_SHORT_CODE', '174379'),
];
