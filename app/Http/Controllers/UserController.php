<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Transaksi;
use Illuminate\Support\Str;

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
