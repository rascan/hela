<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ResponseReceived;
use Rascan\Hela\Models\Log;

class LogResponseReceived
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(ResponseReceived $event)
    {
        Log::create([

        ]);

        // dd($event->response->getReasonPhrase());
        // if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
        //     $event->user->sendEmailVerificationNotification();
        // }
    }
}
