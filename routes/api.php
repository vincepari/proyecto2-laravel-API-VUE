<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Autentificacion Api
  Route::prefix("v1/auth")->group(function(){

    // POST/api/v1/auth/login  -  AuthController@funIngresar
    Route::post("/login", [AuthController::class, "funIngresar"]);
    // POST/api/v1/auth/register  -  AuthController@funRegistro
    Route::post("/register", [AuthController::class, "funRegistro"]);

    Route::middleware('auth:sanctum')->group(function(){

    // GET/api/v1/auth/perfil  -  AuthController@funPerfil
    Route::get("/perfil", [AuthController::class, "funPerfil"]);
    // POST/api/v1/auth/logout   -  AuthController@funSalir
    Route::post("/logout", [AuthController::class, "funSalir"]);
    });
});

/// /Usuario
Route::apiResource("usuario", UsuarioController::class);






