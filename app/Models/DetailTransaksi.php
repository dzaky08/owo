<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function Transaksi() {
        return $this->hasMany(Transaksi::class);
    }
    function User() {
        return $this->belongsTo(User::class);
    }
    function Kamar() {
        return $this->belongsTo(Kamar::class);
    }
    function Hotel() {
        return $this->belongsTo(Hotel::class);
    }
}
