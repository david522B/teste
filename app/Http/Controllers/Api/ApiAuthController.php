<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
            return response()->json([
                'token' => $user->api_token,
            ]);
        }
        return response()->json([
            'login' => 'Email ou senha incorretos!',
        ], 400);
    }

}
