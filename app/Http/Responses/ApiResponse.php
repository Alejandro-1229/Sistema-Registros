<?php

namespace App\Http\Responses;

class ApiResponse
{
    public static function success($message = 'Succes', $statusCode = 200, $data = []){
        return response()->json([
            "message" => $message,
            "Status Code" => $statusCode,
            "error" => false,
            "data"  => $data
        ],$statusCode);
    }

    public static function update($message = 'Succes', $statusCode, $data = []){
        return response()->json([
            "message" => $message,
            "Status Code" => $statusCode,
            "error" => false,
            "data"  => $data
        ],$statusCode);
    }

    public static function error($message = 'Error', $statusCode){
        return response()->json([
            "message" => $message,
            "Status Code" => $statusCode,
            "error" => true
        ],$statusCode);
    }

    

}