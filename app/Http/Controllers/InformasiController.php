<?php

namespace App\Http\Controllers;


use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = Informasi::paginate(7);
        return view('admin.informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasi.create');
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
            'judul' => 'required|min:4',
            'deskripsi' => 'required',
            'gambar_informasi' => 'required',


        ]);

      Informasi::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar_informasi' => $request->file('gambar_informasi')->store('informasi'),


      ]);

        return redirect()->route('informasi.index')->with('success','Data Berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = Informasi::find($id);

        return view('admin.informasi.edit', ['informasi' => $informasi]);
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

        if (empty($request->file('gambar_informasi'))) {

            $informasi = Informasi::find($id);
            $informasi->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'date' => $request->date
            ]);

            return redirect()->route('informasi.index')->with('success','Data Berhasil diedit');

        }else {

            $informasi = Informasi::find($id);
            Storage::delete($informasi->gambar_informasi);
            $informasi->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'date' => $request->date,
                'gambar_informasi' => $request->file('gambar_informasi')->store('informasi')
            ]);
            return redirect()->route('informasi.index')->with('success','Data Berhasil diedit');
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
        $informasi = Informasi::find($id);

        Storage::delete($informasi->gambar_informasi);

        $informasi->delete();

        return redirect()->route('informasi.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_informasi_admin($id)
    {
        $informasi = Informasi::where('id', $id)->first();

        return view('admin.informasi.detailinformasi', [
            'informasi' => $informasi
        ]);
    }


}
