<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $casts = [
        'tgl_terbit' => 'datetime',
    ];
    protected $dates =['tgl_terbit'];
    protected $fillable = ['judul', 'penulis', 'harga', 'tgl_terbit'];
}
