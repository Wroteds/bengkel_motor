<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatServis extends Model
{

    protected $table = 'riwayat_servis';

    protected $dates = ['tanggal_servis']; 
    // atau untuk Laravel versi baru:
    protected $casts = [
        'tanggal_servis' => 'datetime',
    ];
}