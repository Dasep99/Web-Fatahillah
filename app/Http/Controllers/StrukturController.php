<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = Struktur::paginate('5');

        return view('admin.struktur.index', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.struktur.create');
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
            'gambar_struktur' => 'required',


        ]);




      Struktur::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar_struktur' => $request->file('gambar_struktur')->store('struktur'),


      ]);
return redirect()->route('strukturadmin.index')->with('success','Data Berhasil disimpan');
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
        $struktur = Struktur::find($id);

        return view('admin.struktur.edit', ['struktur' => $struktur]);
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

        if (empty($request->file('gambar_struktur'))) {

            $struktur = Struktur::find($id);
            $struktur->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

            ]);

            return redirect()->route('strukturadmin.index')->with('success','Data Berhasil diedit');

        }else {

            $struktur = Struktur::find($id);
            Storage::delete($struktur->gambar_struktur);
            $struktur->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

                'gambar_struktur' => $request->file('gambar_struktur')->store('struktur')
            ]);
            return redirect()->route('strukturadmin.index')->with('success','Data Berhasil diedit');
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
        $struktur = Struktur::find($id);

        Storage::delete($struktur->gambar_struktur);

        $struktur->delete();

        return redirect()->route('strukturadmin.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_struktur_admin($id)
    {
        $struktur = Struktur::where('id', $id)->first();

        return view('admin.struktur.detailstruktur', [
            'struktur' => $struktur
        ]);
    }
}
