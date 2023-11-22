<?php

namespace Rascan\Hela\Services;

class Express extends Service
{
    public function name () : string
    {
        return "M-Pesa Express";
    }

    public function endpoint () : string
    {
        return "mpesa/stkpush/v1/processrequest";
    }

    public function payload () : array
    {
        $phone = $this->data['phone'];
        $passkey = $this->data['passkey'];
        $businessShortCode = $this->data['business_short_code'];

        $transactedAt = now()->format('YmdHis');

        return [
            'hela_service' => 'M-Pesa Express',
            'BusinessShortCode' => $businessShortCode,
            'Timestamp' => $transactedAt,
            'Password' => base64_encode("{$businessShortCode}{$passkey}{$transactedAt}"),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $this->data['amount'],
            'PartyA' => $this->data['phone'],
            'PartyB' => $businessShortCode,
            'PhoneNumber' => $phone,
            'CallBackURL' => $this->data['callback'],
            'AccountReference' => $this->data['reference'],
            'TransactionDesc' => $this->data['comment'],
        ];
    }
}
