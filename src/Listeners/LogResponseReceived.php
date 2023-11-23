<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ResponseReceived;
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

        $messageKey = $response->successful() ? 'ResponseDescription' : 'errorMessage';

        if (str($parts['host'])->endsWith('safaricom.co.ke'))
        {
            HelaLog::create([
                'hela_log_uid' => str()->uuid(),
                'method' => $request->method(),
                'service' => $request->header('service')[0],
                'endpoint' => $parts['path'],
                'status' => $response->successful(),
                'message' => $response->json($messageKey, $response->getReasonPhrase()),
                'request_payload' => json_encode($request->data()),
                'service_response' => json_encode($response->json()),
            ]);
        }
    }
}
