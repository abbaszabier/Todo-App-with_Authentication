<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            'title' => 'Login'
        ]);    
    }

    public function authenticate(Request $request){
        $tes = $request -> validate([
            'name' => 'required|max:14',
            'password' => 'required'
        ]);

        if (Auth::attempt($tes)){
            $request -> session()->regenerate();

            return redirect()->intended('/home');
        }
        // dd('$email, $password');
        return back()-> with('loginError', 'Wah, ada yang salah nih bestie :(');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
