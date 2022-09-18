<?php

namespace App\Http\Responses;

class BadRequest
{
    static public function get(string $message = null)
    {
        return response(
            "{message: \"Requisição inválida\", details: $message}",
            400,
            ["Content-Type" => "application/json"]
        );
    }
}
