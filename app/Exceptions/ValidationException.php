<?php

namespace App\Exceptions;

use Illuminate\Validation\Validator;

class ValidationException extends \Exception
{
    protected Validator $validator;

    function __construct(Validator $validator)
    {
        $this->validator = $validator;

        parent::__construct('Validation error: '.implode(",",$validator->messages()->all()));
    }

    /**
     * @return array
     */
    public function getErrors() : array
    {
        return $this->validator->failed();
    }
}
