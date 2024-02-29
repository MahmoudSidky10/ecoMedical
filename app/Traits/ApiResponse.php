<?php

namespace App\Traits;

trait ApiResponse
{
    protected function apiResponse($request, $message, $data, $successStatus, $statusCode = null)
    {

        $response['message'] = $message;
        if ($data != null)
            $response['data'] = $data;
        $response['success'] = $successStatus;
        if (!$statusCode) {
            $statusCode = 200;
            $response['statusCode'] = $statusCode;
        } else {
            $response['statusCode'] = $statusCode;
        }
        return \Response::json($response, $statusCode);
    }

    protected function sendResponse($request, $message, $data, $successStatus, $accessToken, $statusCode = null)
    {

        $response['message'] = $message;
        if ($data != null)
            $response['data'] = $data;
        $response['success'] = $successStatus;
        $response['access_token'] = $accessToken;
        $response['token_type'] = "Bearer";
        if (!$statusCode) {
            $statusCode = 200;
            $response['statusCode'] = $statusCode;
        } else {
            $response['statusCode'] = $statusCode;
        }
        return \Response::json($response, $statusCode);
    }

}
