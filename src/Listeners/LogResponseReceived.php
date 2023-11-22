<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Support\Facades\Log;
use Rascan\Hela\Facades\MPesa;
use Rascan\Hela\Models\Log as HelaLog;

class LogResponseReceived
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Http\Client\Events\ResponseReceived  $event
     * @return void
     */
    public function handle(ResponseReceived $event)
    {
        $request = $event->request;
        $response = $event->response;
        $parts = parse_url($request->url());

        if (str($parts['host'])->endsWith('safaricom.co.ke'))
        {
            HelaLog::create([
                'hela_log_uid' => str()->uuid(),
                'method' => $request->method(),
                'service' => $request->header('service')[0],
                'endpoint' => $parts['path'],
                'status' => $response->successful(),
                'payload' => json_encode($request->data()),
                'error_code' => $response->json('errorCode', null),
                'message' => $response->json('errorMessage', $response->getReasonPhrase()),
            ]);
        }
    }
}
