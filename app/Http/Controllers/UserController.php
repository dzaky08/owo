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
    
        return redirect()->route('biodata', compact('detailtransaksi'));
    }
    
    function postBiodata(Request $request,  $id) {
        $detailtransaksi = DetailTransaksi::where('id',$id)->with('Kamar')->first();
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);
    
        $kamar = $detailtransaksi->Kamar;
        $user_id = Auth::id();
        $date_mulai = Carbon::parse($request->input('mulai'));
        $date_selesai = Carbon::parse($request->input('selesai'));
    
        $penghuni = Penghuni::create([
            'user_id' => $user_id,
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'mulai' => $date_mulai,
            'selesai' => $date_selesai,
        ]);

        $malam = $date_mulai->diffInDays($date_selesai);
        
        // Retrieve the related Kamar instance using the kamar relationship
    
        if ($kamar) {
            $harga = $kamar->harga;
    
            $detailtransaksi->update([
                'penghuni_id' => $penghuni->id,
                'total_harga' => $harga * $malam
            ]);
    
            return redirect()->route('bayar', compact('detailtransaksi'));
        } else {
            // Handle the case where $detailtransaksi->kamar is null
            // You might want to return an error response or redirect to an error page
            return response()->view('errors.kamar_not_found');
        }
    }
    public function bayar($id)
    {
        $detailtransaksi = DetailTransaksi::where('id',$id)->with(['Kamar', 'Penghuni'])->first();
        $kamar = $detailtransaksi->Kamar;
        $penghuni = $detailtransaksi->Penghuni;
        return view('bayar', compact('detailtransaksi','kamar', 'penghuni'));
    }

    public function postbayar(Request $request, $id)
    {
        $request->validate([
            'bukti_transaksi'=>'required',
        ]);

        $detailtransaksi = DetailTransaksi::where('id', $id)->first();

        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'total_harga' => $detailtransaksi->total_harga,
            'kode'=>'INV'.Str::random(8)
        ]);
        $detailtransaksi->update([
            'transaksi_id'=>$transaksi->id,
            'status'=>'sudah dibayar',
            'bukti_transaksi'=>$request->bukti_transaksi->store('img/buktipembayaran'),
        ]);
        
        return redirect()->route('sumary')->with('status', 'Berhasil Upload bukti');
    }

    public function sumary(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id', auth()->id())->where('status','sudah dibayar')->get();
        return view('sumary', compact('detailtransaksi'));
    }
}
