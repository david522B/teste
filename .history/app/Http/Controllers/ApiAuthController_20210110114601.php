<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'data' => $user->api_token,
            ]);
        }
        return response()->json([
            'login' => 'Email ou senha incorretos!',
        ], 400);
    }

}
