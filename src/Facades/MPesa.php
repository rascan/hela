<?php

namespace Rascan\Hela\Facades;

use Illuminate\Support\Facades\Facade;

class MPesa extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'mpesa';
    }
}
