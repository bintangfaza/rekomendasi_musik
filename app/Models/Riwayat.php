<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = [
        'user_id',
        'lagu_id',
    ];

    //relasi riwayat ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relasi riwayat ke lagu
    public function lagu()
    {
        return $this->belongsTo(Lagu::class);
    }
}
