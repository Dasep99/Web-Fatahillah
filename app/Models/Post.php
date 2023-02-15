<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollection\Models\Media;


class Post extends Model implements HasMedia
{
    use HasFactory, InteractWithMedia;

    protected $guarded = [];
}
