<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //fungsi untuk memanggil view login
    public function login()
    {
        return view('login');
    }

    //fungsi login
    function postLogin(Request $request){
        $cek = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($cek)) {
            $user = Auth::user();
            if ($user->role == 'user') {
                return redirect()->route('home')->with('status', 'Welcome to Home' , $user->name);
            } else {
                return redirect()->route('dash')->with('status', 'Welcome to Home' , $user->name);
            }
            
        }
        return redirect()->route('dash')->with('status', 'Email or Password invalid!');
    }
    //fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
