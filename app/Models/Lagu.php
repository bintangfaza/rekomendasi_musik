<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Lagu extends Model
{
    use HasFactory;
    protected $table = 'lagu';
    protected $fillable = [
        'judul',
        'artis',
        'lirik',
        'genre',
    ];

    //relasi lagu ke riwayat
    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }
}
