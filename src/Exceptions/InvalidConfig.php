<?php

namespace Rascan\Hela\Exceptions;

use Exception;
use Illuminate\Queue\InvalidPayloadException;
use Spatie\Ignition\Contracts\BaseSolution;
use Spatie\Ignition\Contracts\ProvidesSolution;
use Spatie\Ignition\Contracts\Solution;

class InvalidConfig extends InvalidPayloadException implements ProvidesSolution
{
    public function getSolution(): Solution
    {
        // ModelN
        // $validLogLevels = array_map(
        //     fn (string $level) => strtolower($level),
        //     array_keys(Level::VALUES)
        // );

        // $validLogLevelsString = implode(',', $validLogLevels);

        return BaseSolution::create()
            ->setSolutionTitle('You provided an invalid log level')
            ->setSolutionDescription("Please change the log level in your `config/hela.php` file. Valid log levels are {$validLogLevelsString}.");
    }
}
