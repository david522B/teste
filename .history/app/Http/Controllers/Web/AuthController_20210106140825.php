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
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os dados para efetuar o login')->render();
            return back()->wit($json);
        }
        
        return view('welcome');
    }
}
