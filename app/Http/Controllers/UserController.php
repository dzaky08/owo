<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //fungsi beranda dimana menampilkan semua hotel
    public function home()
    {
        $hotel = Hotel::all();
        return view('welcome', compact('hotel'));
    }

    public function kamar(Hotel $hotel)
    {   
        $kamars = $hotel->kamar;
        return view('kamar', compact('hotel', 'kamars'));
    }

    function biodata(DetailTransaksi $detailtransaksi){
        return view('biodata', compact('detailtransaksi'));
    }

    function booking(Kamar $kamar) {
        $detailtransaksi = DetailTransaksi::create([
            'user_id' => Auth::id(),
            'kamar_id' => $kamar->id,
            'status' => 'sudah dibooking',
        ]);

        return redirect()->route('biodata', ['detailtransaksi' => $detailtransaksi->id ]);
    }

    function postBiodata(Request $request, DetailTransaksi $detailtransaksi) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'mulai' => 'required|datetime',
            'selesai' => 'required|datetime',
        ]);

        $user_id = Auth::id();
        $date_mulai = Carbon::parse($request->input('mulai'));
        $date_selesai = Carbon::parse($request->input('selesai'));


        Penghuni::create([
            'user_id' => $user_id,
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'mulai' => $date_mulai,
            'selesai' => $date_selesai,
        ]);

        $malam = $date_mulai->diffInDays($date_selesai);
        $harga = $detailtransaksi->kamar->harga;

        $detailtransaksi->update([
            'total_harga'=> $harga * $malam
        ]);

        return redirect()->route('bayar');
    }
    public function bayar(detailtransaksi $detailtransaksi)
    {
        $kamar = $detailtransaksi->kamar;
        return view('bayar', compact('detailtransaksi','kamar'));
    }

    public function postbayar(Request $request, DetailTransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti_transaksi'=>'required',
        ]);
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'totalharga' => $detailtransaksi->totalharga,
            'kode'=>'INV'.Str::random(8)
        ]);
        $detailtransaksi->update([
            'transaksi_id'=>$transaksi->id,
            'status'=>'cekout',
            'bukti_transaksi'=>$request->bukti_transaksi->store('img/buktipembayaran'),
        ]);
        
        return redirect()->route('sumary')->with('status', 'Berhasil Upload bukti');
    }

    public function sumary(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','cekout')->get();
        return view('sumary', compact('detailtransaksi'));
    }
}
