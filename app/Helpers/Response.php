<?php

namespace App\Helpers;

class Response
{
    public static function objectResponse($message, $success = false, $data = null)
    {
        return (object) [
            'message' => $message,
            'success' => $success,
            'data' => $data,
        ];
    }
}