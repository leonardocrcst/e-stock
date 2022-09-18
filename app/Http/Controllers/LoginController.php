<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    const CONTENT_TYPE = ["Content-Type" => "application/json"];

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                "email" => "Usuário não cadastrado"
            ]);
        }
        Log::register($user, "Entrou");
        return $user->createToken($request->email)->plainTextToken;
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            Log::register($user, "Saiu");
            $user->tokens()->delete();
            return response('{message: "Até breve!"}', 200, self::CONTENT_TYPE);
        }
    }

    public function unauthenticated()
    {
        return response('{message: "Não autenticado"}', 401, self::CONTENT_TYPE);
    }

    public function forbiden()
    {
        return response('{message: "Não autorizado"}', 403, self::CONTENT_TYPE);
    }
}
