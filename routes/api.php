<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

const AUTH = "auth:sanctum";

Route::middleware(AUTH)->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/login", [LoginController::class, "unauthenticated"])->name("login");
Route::post("/login", [LoginController::class, "login"]);
Route::middleware(AUTH)->get("/logout", [LoginController::class, "logout"])->name("logout");
Route::middleware(AUTH)->get("/log/{from?}/{to?}", [LogController::class, "index"]);
