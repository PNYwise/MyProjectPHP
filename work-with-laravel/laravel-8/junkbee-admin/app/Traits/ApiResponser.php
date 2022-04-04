<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Building success response
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message, $data = [], $code = Response::HTTP_OK)
    {
        return response()->json([
            'success' => 1,
            'message' => $message,
            'data' =>  $data
        ], $code);
    }


    public function errorResponse($message = [], $code)
    {
        return response()->json([
            'success' => 0,
            'message' => $message
        ], $code);
    }
}
