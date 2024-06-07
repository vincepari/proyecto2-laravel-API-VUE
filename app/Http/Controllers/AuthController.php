<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function funIngresar(Request $request){
        // validar
        $credenciales = $request->validate([
            "email"=> "required|email",
            "password"=> "required"
        ]);
        // vereficar y autenticar
        if(!Auth::attempt($credenciales)){
            return response()->json(["message" => "Noo Autenticado"], 401);
        }
        // generar el token
       // $usuario = Auth::user();
       //$token = $usuario->createToken("token personal")->plainTextToken;
       $token=$request->user()->createToken("token personal")->plainTextToken;

       return response()->json([
        "access_token" => $token,
        "token_type" => "Bearer",
        "usuario"=> $request->user()
       ]);
    }
///////////////////////////////////////////////////////////////////////////////
    public function funRegistro(Request $request){
        // valiar (Accept: application/json) 302
        $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:users",
            "password"=> "required"
        ]);
        // guardar
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // respuesta
        return response()->json(["message"=> "Usuario registrado", "data"=>$user], 201);
    }
/////////////////////////perfil/////////////////////////////////
    public function funPerfil(Request $request){
        //$usuario=$request->user()-> persona ;
        //$usuario = User::with('persona')->find(Auth::user()->id);
        $usuario = User::with('persona')->find(Auth::id());
        return response()->json($usuario,200);
    }

    public function funSalir(Request $request){
    $usuario=$request->user();
    $usuario->tokens()->delete();
     return response()->json(["message"=> "Lo Out"]);
    }
}

