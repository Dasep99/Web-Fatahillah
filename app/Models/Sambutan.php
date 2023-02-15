<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    use HasFactory;
    protected $table = 'sambutans';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar_sambutan',

    ];

    protected $hidden = [

    ];
}
