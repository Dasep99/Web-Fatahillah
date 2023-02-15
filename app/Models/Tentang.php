<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'gambar_tentang',
        'deskripsi',


    ];

    protected $hidden = [

    ];
}
