<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sambutan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sambutan = Sambutan::paginate('6');

        return view('admin.sambutan.index', compact('sambutan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sambutan.create');
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
            'gambar_sambutan' => 'required',


        ]);




      Sambutan::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar_sambutan' => $request->file('gambar_sambutan')->store('sambutan'),


      ]);
        return redirect()->route('sambutans.index')->with('success','Data Berhasil disimpan');
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
        $sambutan = Sambutan::find($id);

        return view('admin.sambutan.edit', ['sambutan' => $sambutan]);
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

        if (empty($request->file('gambar_sambutan'))) {

            $sambutan = Sambutan::find($id);
            $sambutan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

            ]);

            return redirect()->route('sambutans.index')->with('success','Data Berhasil diedit');

        }else {

            $sambutan = Sambutan::find($id);
            Storage::delete($sambutan->gambar_sambutan);
            $sambutan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

                'gambar_sambutan' => $request->file('gambar_sambutan')->store('sambutan')
            ]);
            return redirect()->route('sambutans.index')->with('success','Data Berhasil diedit');

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
        $sambutan = Sambutan::find($id);

        Storage::delete($sambutan->gambar_sambutan);

        $sambutan->delete();

        return redirect()->route('sambutans.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_sambutan_admin($id)
    {
        $sambutan = Sambutan::where('id', $id)->first();

        return view('admin.sambutan.detailsambutan', [
            'sambutan' => $sambutan
        ]);
    }
}
