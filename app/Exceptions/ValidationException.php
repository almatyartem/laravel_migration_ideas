<?php

namespace App\Exceptions;

use App\Http\ApiResponse;
use Illuminate\Http\JsonResponse;
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

    /**
     * @return JsonResponse
     */
    public function render()
    {
        return ApiResponse::errorResponse(400, ['validation_errors' => $this->getErrors()]);
    }
}
