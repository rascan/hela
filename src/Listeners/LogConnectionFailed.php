<?php

namespace Rascan\Hela\Listeners;

use Illuminate\Http\Client\Events\ConnectionFailed;

class LogConnectionFailed
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(ConnectionFailed $event)
    {
        dd($event->request);
        // if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
        //     $event->user->sendEmailVerificationNotification();
        // }
    }
}
