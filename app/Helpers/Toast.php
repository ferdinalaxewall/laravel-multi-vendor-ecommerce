<?php

namespace App\Helpers;

class Toast
{
    public static function success($message)
    {
        return array(
            'message' => $message,
            'alert-type' => 'success'
        );
    }
    
    public static function error($message)
    {
        return array(
            'message' => $message,
            'alert-type' => 'error'
        );
    }
    
    public static function info($message)
    {
        return array(
            'message' => $message,
            'alert-type' => 'info'
        );
    }
    
    public static function warning($message)
    {
        return array(
            'message' => $message,
            'alert-type' => 'warning'
        );
    }
}