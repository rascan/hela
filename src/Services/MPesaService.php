<?php

namespace Rascan\Hela\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Rascan\Hela\Validation;

abstract class MPesaService
{
    // use Validation;

    public function __construct(protected array $inputs){}

    abstract function rules () : array;

    abstract function handle ();

    // public function handle ()
    // {
    //     // $rules = Arr::only($this->validationRules, $this->rules());

    //     // Validator::validate($this->inputs, $rules, $this->validationMessages);

    //     // dd("HANDLE THE SHIT MAN");
    // }
}
