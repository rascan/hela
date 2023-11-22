<?php

namespace Rascan\Hela;

use Rascan\Hela\Services\Service;

trait ConstructService
{
    /**
     * Constructs a service and returns the service object
     *
     * @param  string $name
     * @param  array $options
     */
    public static function service (string $name, array $options) : Service
    {
        if (!in_array($name, ConstantManager::SERVICES)) {
            throw new \ErrorException("The service [$name] is not supported.");
        }

        $serviceName = "Rascan\\Hela\\Services\\$name";

        return new $serviceName($options);
    }
}
