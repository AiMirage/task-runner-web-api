<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class BaseController extends Controller
{
    public function sendResponse($result, $message): JsonResponse
    {
        return Response::json($this->makeResponse($message, $result));
    }

    public function sendError($error, $code = 404): JsonResponse
    {
        return Response::json($this->makeError($error), $code);
    }

    public function sendSuccess($message): JsonResponse
    {
        return Response::json([
            'status' => 200,
            'message' => $message
        ], 200);
    }

    /**
     * @param string $message
     * @param mixed $data
     *
     * @return array
     */
    public static function makeResponse(string $message, mixed $data): array
    {
        return [
            'status' => 200,
            'data' => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array $data
     *
     * @return array
     */
    public static function makeError(string $message, array $data = [])
    {
        $res = [
            'status' => 400,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }
}
