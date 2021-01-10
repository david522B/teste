<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm() {
        if(Auth::check() === true) {
            return redirect()->route('dashboard');
        }

        return view('welcome');
    }

    public function login(Request $request) { 
        $credentials = $request->only('email', 'password');
        if (in_array('', $credentials)) {
            
            return back()
            ->withInput($request->except('password'))
            ->withErrors([
                'login' => 'Informe todos os dados para efetuar o login',
            ]);
        }
        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()
        ->withInput($request->except('password'))
        ->withErrors([
            'email' => 'Email ou senha incorretos!',
        ]);
        
        return view('welcome');
    }
}
