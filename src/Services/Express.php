<?php

namespace Rascan\Hela\Services;

use Illuminate\Support\Arr;

class Express extends Service
{
    public function name () : string
    {
        return 'M-Pesa Express';
    }

    public function endpoint () : string
    {
        return 'mpesa/stkpush/v1/processrequest';
    }

    public function inputs () : array
    {
        return [
            'business_short_code',
            'passkey',
            'amount',
            'phone',
            'reference',
            'description',
        ];
    }

    public function payload () : array
    {
        $businessShortCode = $this->data['business_short_code'];
        $transactedAt = now()->format('YmdHis');
        $passkey = $this->data['passkey'];
        $phone = $this->data['phone'];

        return [
            'BusinessShortCode' => $businessShortCode,
            'Password' => base64_encode("{$businessShortCode}{$passkey}{$transactedAt}"),
            'Timestamp' => $transactedAt,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $this->data['amount'],
            'PartyA' => $phone,
            'PartyB' => $businessShortCode,
            'PhoneNumber' => $phone,
            'CallBackURL' => url(config('hela.callback')),
            'AccountReference' => $this->data['reference'],
            'TransactionDesc' => $this->data['description'],
        ];
    }
}
