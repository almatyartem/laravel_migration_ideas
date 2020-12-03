<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * @param bool $success
     * @param null $data
     * @return JsonResponse
     */
    public static function response($data = null, bool $success = true) : JsonResponse
    {
        return self::make(200, ['success' => $success, 'data' => $data]);
    }

    /**
     * @param int $statusCode
     * @param array|null $errors
     * @return JsonResponse
     */
    public static function errorResponse(int $statusCode = 500, array $errors = null) : JsonResponse
    {
        return self::make($statusCode, ['success' => false, 'errors' => $errors]);
    }

    /**
     * @param int $statusCode
     * @param array $data
     * @return JsonResponse
     */
    protected static function make(int $statusCode, array $data) : JsonResponse
    {
        return response()->json($data, $statusCode);
    }
}
