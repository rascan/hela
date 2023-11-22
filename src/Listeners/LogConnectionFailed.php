<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ConnectionFailed;
use Rascan\Hela\Models\Log;

class LogConnectionFailed
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Http\Client\Events\ConnectionFailed  $event
     * @return void
     */
    public function handle(ConnectionFailed $event)
    {
        Log::info([$event->request->data(), $event->request->url()]);

        // if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
        //     $event->user->sendEmailVerificationNotification();
        // }
    }
}
