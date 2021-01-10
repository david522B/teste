<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        if(Auth::check() === true) {
            $this->home();
        }

        return view('welcome');
    }

    public function login(Request $request) { 
        if (in_array('', $request->only('email', 'password'))) {
            
            return back()
                ->withInput($request->except('password'))
                ->withErrors([
                    'login' => 'Informe todos os dados para efetuar o login',
                ]);
        }
        if(Auth::attempt($request->only('email', 'password'))) {
            $this->home()
        }

        return back()
            ->withInput($request->except('password'))
            ->withErrors([
                'login' => 'Email ou senha incorretos!',
            ]);
    }

    private function home() { 
        $user = Auth::user();

        if(User::isAdmin($user->id))
    }
}
