<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [
            'title' => 'Register'
        ]); 
    }

    public function store(Request $request){
        $ValidatedData = $request->validate([
           'name' => 'required|max:10',
           'email' => 'required|email:dns|unique:users',
           'password' => 'required|min:5|max:255'
       ]);

        $ValidatedData['password'] = Hash::make($ValidatedData['password']);

        user::create($ValidatedData); 

        return redirect('/')->with('success', 'Yeay, berhasil daftar! Silahkan login bestie :)');
    }
}
