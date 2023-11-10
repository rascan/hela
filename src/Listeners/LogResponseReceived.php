<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ResponseReceived;

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
        dd($event->response->getReasonPhrase());
        // if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
        //     $event->user->sendEmailVerificationNotification();
        // }
    }
}
