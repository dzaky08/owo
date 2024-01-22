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

    //fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
