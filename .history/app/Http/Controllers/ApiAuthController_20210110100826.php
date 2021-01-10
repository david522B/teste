<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function login(Request $request) {
        if (in_array('', $request->only('email', 'password'))) {
            
            return response()->json([
                'login' => 'Email e senha são necessarios!',
            ], 400);
        }
        if(Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $user->generateToken();
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }
        return response()->json([
            'login' => 'Email ou senha incorretos!',
        ], 400);
    }

    public function logout(Request $request) {
        if (in_array('', $request->only('email', 'password'))) {
            
            return response()->json([
                'login' => 'Email e senha são necessarios!',
            ], 400);
        }
        if(Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $user->generateToken();
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }
        return response()->json([
            'login' => 'Email ou senha incorretos!',
        ], 400);
    }
}
