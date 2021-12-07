<?php

namespace App\Http\Utils;

class Response
{
    static public function success($label, $data)
    {
        return response([
            'message' => $label,
            'results' => $data,
            'code' => 200
        ], 200);
    }
    static public function created($label, $data)
    {
        return response([
            'message' => $label,
            'results' => $data,
            'code' => 201
        ], 201);
    }
    static public function failure($label, $code)
    {
        return response([
            'message' => $label,
            'results' => null,
            'code' => $code
        ], $code);
    }
}
