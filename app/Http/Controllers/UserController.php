<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class UserController extends Controller
{
    public function hotel()
    {
        return view('hotel');
    }

    //fungsi beranda dimana menampilkan semua hotel
    public function home()
    {
        $hotel = Hotel::all();
        return view('beranda', compact('hotel'));
    }
}
