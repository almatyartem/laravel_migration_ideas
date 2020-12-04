<?php

namespace App\Exceptions;

use App\Http\ApiResponse;
use Illuminate\Http\JsonResponse;

class NotFoundException extends \Exception
{
    /**
     * @return JsonResponse
     */
    public function render()
    {
        return ApiResponse::errorResponse(404);
    }
}
