<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = Prestasi::paginate(5);
        return view('admin.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prestasi.create');
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

            'gambar_prestasi' => 'required',

        ]);




      Prestasi::create([
        'judul' => $request->judul,

        'gambar_prestasi' => $request->file('gambar_prestasi')->store('prestasi'),


      ]);
            return redirect()->route('prestasiadmin.index')->with('success','Data Berhasil disimpan');
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
        $prestasi = Prestasi::find($id);


        return view('admin.prestasi.edit', compact('prestasi'));
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
        if (empty($request->file('gambar_prestasi'))) {

            $prestasi = Prestasi::find($id);
            $prestasi->update([
                'judul' => $request->judul,


            ]);

            return redirect()->route('prestasiadmin.index')->with('success','Data Berhasil diedit');

        }else {

            $prestasi = prestasi::find($id);
            Storage::delete($prestasi->gambar_prestasi);
            $prestasi->update([
                'judul' => $request->judul,


                'gambar_prestasi' => $request->file('gambar_prestasi')->store('prestasi')
            ]);
            return redirect()->route('prestasiadmin.index')->with('success','Data Berhasil diedit');
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
        $prestasi = Prestasi::find($id);

        Storage::delete($prestasi->gambar_prestasi);

        $prestasi->delete();

        return redirect()->route('prestasiadmin.index')->with('success','Data Berhasil dihapus');
    }


    public function detail_prestasi_admin($id)
    {
        $prestasi = Prestasi::where('id', $id)->first();

        return view('admin.prestasi.detailprestasi', [
            'prestasi' => $prestasi
        ]);
    }
}
