<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::paginate('7');

        return view('admin.carousel.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => '|min:4',
            'deskripsi',
            'gambar' => 'required',


        ]);




      Carousel::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar' => $request->file('gambar')->store('carousel'),



      ]);
return redirect()->route('carousel.index')->with('success','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::find($id);

        return view('admin.carousel.edit', ['carousel' => $carousel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('gambar'))) {

            $carousel = Carousel::find($id);
            $carousel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

            ]);

            return redirect()->route('carousel.index')->with('success','Data Berhasil diedit');

        }else {

            $carousel = Carousel::find($id);
            Storage::delete($carousel->gambar);
            $carousel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

                'gambar' => $request->file('gambar')->store('carousel')
            ]);
            return redirect()->route('carousel.index')->with('success','Data Berhasil diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::find($id);

        Storage::delete($carousel->gambar);

        $carousel->delete();

        return redirect()->route('carousel.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_carousel_admin($id)
    {
        $carousel = Carousel::where('id', $id)->first();

        return view('admin.carousel.detailcarousel', [
            'carousel' => $carousel
        ]);
    }
}
