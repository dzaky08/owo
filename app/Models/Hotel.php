<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function Kamar() {
        return $this->hasMany(kamar::class);
    }
    function DetailTransaksi() {
        return $this->belongsTo(DetailTransaksi::class);
    }
}
