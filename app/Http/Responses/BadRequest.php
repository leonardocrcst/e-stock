<?php

namespace App\Http\Responses;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use stdClass;

class BadRequest extends
    AnonymousResourceCollection
{
    static public function get(string $message = null): stdClass
    {
        $response = new stdClass();
        $response->message = "Requisição inválida.";
        $response->details = $message;
        return $response;
    }
}
