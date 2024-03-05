<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $newEmpleado = Empleado::create([
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'numeroContacto' => $request->input('numeroContacto'),
        ]);

        $idNewEmpleado = $newEmpleado->idEmpl;

        $newUsuario = Usuario::create([
            'codUsuario' => $request->input('codUsuario'),
            'password' => Hash::make($request->password),
            'idEmpleado' => $idNewEmpleado,
            'idTipoUsuario' => $request->input('idTipoUsuario')
        ]);

        $token = $newUsuario->createToken('auth_token')->plainTextToken;

        $data = [
            'Empleado' => $newEmpleado,
            'Codigo Usuario' => $newUsuario->codUsuario,
            'password' => $newUsuario->password

        ];

        return response()->json([$data, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function logIn(Request $request)
    {
        if(Auth::attempt($request->only('codUsuario','password'))) return response()->json(['message'=>'Datos Incorrectos'],403);
        
        $usuario = Usuario::where('codUsuario', $request['codUsuario'])->firstOrFail();
        $token =  $usuario->createToken('auth_token')->plainTextToken;

        $data = [
            'Message' => 'Hi '.$usuario->codUsuario,
            'Access Token' => $token,
            'Token Type' => 'Bearer',
            'Usuario' => $usuario
        ];

        return response()->json($data, 200);
    }

    public function logOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $menssage = 'LogOut Succesfull';

        return $menssage;
    }

    public function getUser()
    {
    }
}
