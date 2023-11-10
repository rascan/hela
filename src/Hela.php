<?php

namespace Rascan\Hela;

class Hela
{
    protected $provider = 'mpesa';

    public function __call ($method, $args)
    {
        // <!-- Hela::provider('mpesa')->service('express', [
        //     'amount' => 1000.00,
        //     'phone' => '254711887341',
        // ]) -->

    }
}
