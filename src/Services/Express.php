<?php

namespace Rascan\Hela\Services;

class Express extends MPesaService
{
    public function payload () : array
    {
        $businessShortCode = $this->inputs['business_short_code'];
        $transactedAt = now()->format('YmdHis');
        $passkey = $this->inputs['passkey'];

        return [
            'BusinessShortCode' => $this->inputs['business_short_code'],
            'Timestamp' => $transactedAt,
            'Password' => base64_encode("{$businessShortCode}{$passkey}{$transactedAt}"),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $this->inputs['amount'],
            'PartyA' => $this->inputs['phone'],
            'PartyB' => $businessShortCode,
            'PhoneNumber' => $this->inputs['phone'],
            'CallBackURL' => $this->inputs['callback'],
            'AccountReference' => '',
            'TransactionDesc' => '',
        ];
    }

    public function rules () : array
    {
        dd($this->inputs);

        return [
            'business_short_code' => [
                'required',
            ],

            'amount' => [
                'required',
            ],

            'phone' => [
                'required',
            ],

            'callback' => [
                'required',
            ],
        ];
    }

    // public function handle ()
    // {

    //     // $shortCode = $this->configs['short_code'];
    //     // $passkey = $this->configs['passkey'];

    //     // $response = Http::mpesa()->post('mpesa/stkpush/v1/processrequest', [
    //     //     'BusinessShortCode' => $shortCode,
    //     //     'Timestamp' => $payload['transacted_at'],
    //     //     'Password' => base64_encode("{$shortCode}{$passkey}{$payload['transacted_at']}"),
    //     //     'TransactionType' => "CustomerPayBillOnline",
    //     //     'Amount' => $payload['amount'],
    //     //     'PartyA' => $payload['phone'],
    //     //     'PartyB' => $shortCode,
    //     //     'PhoneNumber' => $payload['phone'],
    //     //     'CallBackURL' => $payload['callback_url'],
    //     //     'AccountReference' => "TEST",
    //     //     'TransactionDesc' => "Payment for Rascan",
    //     // ]);

    //     // return $response->json();
    // }
}
