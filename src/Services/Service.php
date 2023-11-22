<?php

namespace Rascan\Hela\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Rascan\Hela\Validation;

abstract class Service
{
    public function __construct(protected array $data){}

    abstract function payload () : array;

    abstract function endpoint () : string;
}
