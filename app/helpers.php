<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

if (!function_exists('swcResponse')) {
    function swcResponse(array $result, int $status = 200, ?string $errorMessage = null, array $headers = []): JsonResponse
    {
        return response()->json(['result' => $result, 'error' => $errorMessage], $status, $headers);
    }
}
if (!function_exists('serverErrorResponse')) {
    function serverErrorResponse(string $errorMessage, array $headers = []): JsonResponse
    {
        return response()->json(['result' => [], 'error' => $errorMessage], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR, $headers);
    }
}
