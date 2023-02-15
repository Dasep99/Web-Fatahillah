<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminTentangController;
use App\Http\Controllers\users\BeritaController;
use App\Http\Controllers\users\GaleriController;
use App\Http\Controllers\users\KontakController;
use App\Http\Controllers\users\TentangController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [FrontendController::class, 'index'])->name('index');

/*
                Admin Controller
*/
Route::group(['middleware' => 'auth'], function () {

Route::get('/adminHome', [AdminController::class, 'index']);

Route::resource('informasi', InformasiController::class)->middleware('auth');
Route::resource('kegiatan', KegiatanController::class);
Route::resource('admintentang', AdminTentangController::class);
Route::resource('Pesan', PesanController::class);;
Route::resource('carousel', CarouselController::class);
Route::resource('ekstrakurikuleradmin', EkstrakurikulerController::class);
Route::resource('strukturadmin', StrukturController::class);
Route::resource('prestasiadmin', PrestasiController::class);
Route::resource('adminguru', GuruController::class);
Route::resource('adminsiswa', SiswaController::class);
Route::resource('adminfasilitas', FasilitasController::class);
Route::resource('adminvideo', VideoController::class);
Route::resource('sambutans', SambutanController::class);
Route::resource('adminkontak', ContactController::class);
Route::resource('adminprofil', ProfilController::class);
Route::resource('file', FileController::class);
Route::resource('useradmin', UserController::class);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);
Route::post('upload_image',[InformasiController::class, 'uploadImage'])->name('upload');
Route::post('logout', [LoginController::class, 'logout']);
Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');
Route::post('upload', [KegiatanController::class, 'uploadImage'])->name('ckeditor.upload');


Route::get('/detail-video-admin/{deskripsi}',[VideoController::class, 'detail_video_admin'])->name('detail-video-admin');
Route::get('/detail-informasi-admin/{deskripsi}',[InformasiController::class, 'detail_informasi_admin'])->name('detail-informasi-admin');
Route::get('/detail-profil-admin/{deskripsi}',[ProfilController::class, 'detail_profil_admin'])->name('detail-profil-admin');
Route::get('/detail-sambutan-admin/{deskripsi}',[SambutanController::class, 'detail_sambutan_admin'])->name('detail-sambutan-admin');
Route::get('/detail-admin-kegiatan/{deskripsi}',[AdminTentangController::class, 'detail_tentang_admin'])->name('detail-tentang-admin');
Route::get('/detail-ekstrakurikuler-admin/{deskripsi}',[EkstrakurikulerController::class, 'detail_ekstrakurikuler_admin'])->name('detail-ekstrakurikuler-admin');
Route::get('/detail-struktur-admin/{deskripsi}',[StrukturController::class, 'detail_struktur_admin'])->name('detail-struktur-admin');
Route::get('/detail-prestasi-admin/{deskripsi}',[PrestasiController::class, 'detail_prestasi_admin'])->name('detail-prestasi-admin');
Route::get('/detail-fasilitas-admin/{deskripsi}',[FasilitasController::class, 'detail_fasilitas_admin'])->name('detail-fasilitas-admin');
Route::get('/detail-informasi-kegiatan/{deskripsi}',[KegiatanController::class, 'detail_kegiatan_admin'])->name('detail-kegiatan-admin');
Route::get('/detail-pesan-admin/{deskripsi}',[PesanController::class, 'detail_pesan_admin'])->name('detail-pesan-admin');
Route::get('/detail-carousel-admin/{deskripsi}',[CarouselController::class, 'detail_carousel_admin'])->name('detail-carousel-admin');
Route::get('/detail-kontak-admin/{deskripsi}',[ContactController::class, 'detail_kontak_admin'])->name('detail-kontak-admin');
Route::get('/detail-file-admin/{deskripsi}',[FileController::class, 'detail_file_admin'])->name('detail-file-admin');
Route::get('/downloadfile/{file}',[FileController::class, 'downloadfile'])->name('downloadfile');

});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');


/* Frontend Controller*/

Route::resource('berita', BeritaController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('kontak', KontakController::class);
Route::resource('visi-misi', TentangController::class);


Route::get('ekstrakurikuler', [FrontendController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('struktur', [FrontendController::class, 'struktur'])->name('struktur');
Route::get('prestasi', [FrontendController::class, 'prestasi'])->name('prestasi');
Route::get('fasilitas', [FrontendController::class, 'fasilitas'])->name('fasilitas');
Route::get('guru', [FrontendController::class, 'guru'])->name('guru');
Route::get('siswa', [FrontendController::class, 'siswa'])->name('siswa');
Route::get('video', [FrontendController::class, 'video'])->name('video');



Route::get('/detail-informasi/{deskripsi}',[FrontendController::class, 'detail_informasi'])->name('detail-informasi');
Route::get('/detail-kegiatan/{deskripsi}',[FrontendController::class, 'detail_kegiatan'])->name('detail-kegiatan');
Route::get('/detail-sambutan/{deskripsi}',[FrontendController::class, 'detail_sambutan'])->name('detail-sambutan');
Route::get('/detail-video/{deskripsi}',[FrontendController::class, 'detail_video'])->name('detail-video');
