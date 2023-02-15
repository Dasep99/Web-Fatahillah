<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;
    protected $table = 'strukturs';

    protected $fillable = [

        'gambar_struktur',
        'judul',
        'deskripsi'

    ];

    protected $hidden = [

    ];
}
