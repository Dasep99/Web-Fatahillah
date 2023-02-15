<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\Carousel;
use App\Models\Struktur;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Fasilitas;
use App\Models\Sambutan;
use App\Models\Kontak;
use App\Models\Profile;
use App\Models\Video;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $informasi = Informasi::paginate('6');
        $kegiatan = Kegiatan::paginate('6');
        $profil = Profile::paginate('6');
        $carousel = Carousel::paginate('4');
        $sambutan = Sambutan::paginate('1');

        return view('frontend.dashboard', compact('informasi','kegiatan','profil',
                                                    'carousel','sambutan'));



    }

    public function footer()
    {
        $kontak = Kontak::paginate('1');
        return view('admin.includes.footer', compact('kontak'));
    }



    public function detail_sambutan($id)
    {
        $sambutan = sambutan::where('id', $id)->first();

        $informasiterbaru = Informasi::orderBy('created_at', 'DESC')->limit('4')->get();

        return view('frontend.detail.detailsambutan', [
            'sambutan' => $sambutan,
            'informasiterbaru' => $informasiterbaru
        ]);
    }



    public function detail_informasi($id)
    {
        $informasi = Informasi::where('id', $id)->first();

        $informasiterbaru = Informasi::orderBy('created_at', 'DESC')->limit('4')->get();

        return view('frontend.detail.detailinformasi', [
            'informasi' => $informasi,
            'informasiterbaru' => $informasiterbaru
        ]);
    }

    public function detail_kegiatan($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();

        $kegiatanterbaru = Kegiatan::orderBy('created_at', 'DESC')->limit('4')->get();

        return view('frontend.detail.detailkegiatan', [
            'kegiatan' => $kegiatan,
            'kegiatanterbaru' => $kegiatanterbaru
        ]);
    }

    public function ekstrakurikuler()
    {

        $informasiterbaru = Informasi::orderBy('created_at', 'DESC')->limit('4')->get();
        $ekstrakurikuler = Ekstrakurikuler::paginate('1');
        return view('frontend.profil.ekstrakurikuler', compact('ekstrakurikuler','informasiterbaru'));
    }

    public function struktur()
    {
        $informasiterbaru = Informasi::orderBy('created_at', 'DESC')->limit('4')->get();
        $struktur = Struktur::paginate('1');
        return view('frontend.profil.struktur', compact('struktur','informasiterbaru'));
    }

    public function prestasi()
    {
        $prestasi = Prestasi::paginate('12');

        return view('frontend.profil.prestasi', compact('prestasi'));
    }

    public function fasilitas()
    {

        $fasilitas = Fasilitas::paginate('1');

        $informasiterbaru = Informasi::orderBy('created_at', 'DESC')->limit('4')->get();
        return view('frontend.profil.fasilitas', compact('fasilitas', 'informasiterbaru'));
    }

    public function guru()
    {
        $guru = Guru::paginate('12');
         return view('frontend.profil.guru', compact('guru'));
    }

    public function siswa()
    {
        $siswa = Siswa::paginate('12');
        return view('frontend.profil.siswa', compact('siswa'));
    }

    public function video()
    {
        $video = Video::paginate('12');
        return view('frontend.video', compact('video'));
    }

    public function detail_video($id)
    {
        $video = Video::where('id', $id)->first();

        $videoterbaru = Video::orderBy('created_at', 'DESC')->limit('4')->get();

        return view('frontend.detail.detailvideo', [
            'video' => $video,
            'videoterbaru' => $videoterbaru
        ]);
    }



}
