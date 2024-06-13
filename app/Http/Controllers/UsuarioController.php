<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        //lista
        $usuario = User::get();

        return response()->json($usuario, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"

        ]);
        // guardar
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        // responder

        return response()->json(["message" => "Usuario resgistrado"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ///  validar
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email,$id",
            "password" => "required"
        ]);

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->password){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->update();
        // responder
        return response()->json(["message" => "Usuario actualizar"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $usuario = User::find($id);
        $usuario->delete();

        return response()->json(["message" => "Usuario eliminado"], 200);
    }
}
