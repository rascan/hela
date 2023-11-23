<?php

namespace Rascan\Hela;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait ValidatesService
{
    /**
     * Set of validation rules
     *
     * @return array
     */
    public function rules () : array
    {
        return [
            'business_short_code' => [
                'required',
                'numeric',
                'digits_between:5,6',
            ],

            'passkey' => [
                'required',
            ],

            'amount' => [
                'required',
                'integer',
                'min:1',
                'max:250000',
            ],

            'phone' => [
                'required',
                'string',
            ],

            'reference' => [
                'required',
                'string',
                'max:12',
            ],

            'description' => [
                'string',
                'min:1',
                'max:13',
            ],
        ];
    }

    /**
     * Messages sent on validation errors
     *
     * @return array
     */
    public function messages ()
    {
        return [

        ];
    }

    /**
     * Validate the inputs provided against the available rules
     *
     * @return void
     *
     * @throws ValidationExcepion
     */
    public function validate () : void
    {
        $rules = Arr::only($this->rules(), $this->inputs());

        $messages = Arr::only($this->messages(), $this->inputs());

        Validator::make($this->data, $rules, $messages)->validate();
    }
}
