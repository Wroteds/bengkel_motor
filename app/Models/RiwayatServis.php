<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatServis extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (fillable)
     */
    protected $fillable = [
        'user_id',
        'nama_servis',
        'deskripsi',
        'tanggal_servis',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
