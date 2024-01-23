<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function Hotel() {
        return $this->belongsTo(Hotel::class);
    }
    function DetailTransaksi() {
        return $this->belongsTo(DetailTransaksi::class);
    }
}
