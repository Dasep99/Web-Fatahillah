<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $informasiterbaru = Informasi::orderBy('created_at', 'DESC')->limit('4')->get();

        $user = User::all()->count();
        $informasi = Informasi::all()->count();
        $kegiatan = Kegiatan::all()->count();
        $video = Video::all()->count();

        return view('dashboardadmin', compact('user','informasi','kegiatan','video','informasiterbaru'));
    }
}
