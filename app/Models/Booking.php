<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'jenis_servis',
        'catatan',
        'tanggal_booking',
        'status',
        'kendaraan',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}