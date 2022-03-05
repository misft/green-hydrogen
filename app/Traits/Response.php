<?php

namespace App\Traits;

trait Response {
    public function success(int $code = 200, string $message = '', array $body = []) {
        return response([
            'code' => $code,
            'message' => $message,
            'data'=>$body
        ], $code);
    }

    public function unauthorized(int $code = 401, string $message = '', array $errors = []) {
        return response([
            'code' => $code,
            'message' => $message,
            'errors' => $errors   
        ], $code);
    }

    public function badRequest(int $code = 400, string $message = '', array $errors = []) {
        return response([
            'code' => $code,
            'message' => $message,
            'errors' => $errors   
        ], $code);
    }
}