<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function User() {
        return $this->belongsTo(User::class);
    }
    function DetailTransaksi() {
        return $this->belongsTo(DetailTransaksi::class, 'transaksi_id');
    }
    
}
