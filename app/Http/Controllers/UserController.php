<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        $data = [
            'email' => request('email'), 
            'password' => request('password')
        ];

        if(Auth::attempt($data)){
            $user = Auth::user();
            $loginData['token'] = $user->createToken('Booktoken')->accessToken;
            return response()->json([
                "message" => "Bienvenido",
                "data" => $loginData
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                "message" => "ocurrio un error, no se pudo iniciar sesión",
            ],401);
        }
    }

    public function register( Request $request ){
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $loginData['token'] = $user->createToken('Booktoken')->accessToken; 
        return response()->json([
            "message" => "Bienvenido nuevo usuario",
            "data" => $loginData
        ],Response::HTTP_OK);
    }
}
