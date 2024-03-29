<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function createResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public static function createError($message, $data = [])
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return $response;
    }

    public function sendResponse($result, $message = 'Action successful')
    {
        return Response::json($this->createResponse($message, $result));
    }

    public function sendError($message, $data = [], $code = 404)
    {
        return Response::json($this->createError($message, $data), $code);
    }

    public function validationError($message = 'Validation error', $data = [], $errorCode = 400)
    {
        return Response::json($this->createError($message, $data), $errorCode);
    }

    public function unauthorizedError()
    {
        return Response::json($this->createError('Unauthorized'), 401);
    }
}
