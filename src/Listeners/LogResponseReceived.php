<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ResponseReceived;
use Rascan\Hela\Facades\MPesa;
use Rascan\Hela\Models\Log;

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
        Log::create([
            'log_level' => 'debug',
            'log_uid' => str()->uuid(),
            'service' => MPesa::service(),
            'success' => $event->response->successful(),
            'status_code' => $event->response->status(),
            'message' => $event->response->getReasonPhrase(),
            'request_details' => json_encode([
                'url' => $event->request->url(),
                'data' => $event->request->data(),
                'method' => $event->request->method(),
            ]),
        ]);
    }
}
