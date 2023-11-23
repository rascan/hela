<?php

namespace Rascan\Hela;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use InvalidArgumentException;
use Rascan\Hela\Services\Service;

class HelaService
{
    /**
     * Definitions of the Daraja services that Hela supports
     *
     * @var array
     */
    protected const SERVICES = [
        'express',
    ];

    /**
     * Constructs a service and returns the service object
     *
     * @param  string $name
     * @param  array $options
     *
     * @return Service
     */
    public static function service (string $name, array $options) : Service
    {
        if (!in_array($name, self::SERVICES)) {
            throw new \InvalidArgumentException("The service [$name] is not supported. Supported services" . implode(', ', self::SERVICES));
        }

        $serviceName = "Rascan\\Hela\\Services\\$name";

        return new $serviceName($options);
    }
}
