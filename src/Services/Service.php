<?php

namespace Rascan\Hela\Services;

use Illuminate\Validation\ValidationException;
use Rascan\Hela\ValidatesService;

abstract class Service
{
    use ValidatesService;

    public function __construct(protected array $data){
        $this->validate();
    }

    /**
     * The display name of the service being run
     *
     * @return string
     */
    abstract function name () : string;

    /**
     * The inputs that need to be validated
     *
     * @return array
     */
    abstract function inputs () : array;

    /**
     * The payload that will be sent to the daraja APIs
     *
     * @return array
     */
    abstract function payload () : array;

    /**
     * The endpoint that communicates to the daraja APIs
     *
     * @return array
     */
    abstract function endpoint () : string;
}
