<?php

namespace App\Http\Controllers;
use App\Models\Kegiatan;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::paginate('7');
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.create');
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




      Kegiatan::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar_informasi' => $request->file('gambar_informasi')->store('kegiatan'),


      ]);


      return redirect()->route('kegiatan.index')->with('success','Data Berhasil disimpan');
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
        $kegiatan = Kegiatan::find($id);

        return view('admin.kegiatan.edit', ['kegiatan' => $kegiatan]);
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

            $kegiatan = Kegiatan::find($id);
            $kegiatan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'date' => $request->date
            ]);

            return redirect()->route('kegiatan.index')->with('success','Data Berhasil diedit');

        }else {

            $kegiatan = Kegiatan::find($id);
            Storage::delete($kegiatan->gambar_informasi);
            $kegiatan->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'date' => $request->date,
                'gambar_informasi' => $request->file('gambar_informasi')->store('kegiatan')
            ]);
            return redirect()->route('kegiatan.index')->with('success','Data Berhasil diedit');
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
        $kegiatan = Kegiatan::find($id);

        Storage::delete($kegiatan->gambar_informasi);

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_kegiatan_admin($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();

        return view('admin.kegiatan.detailkegiatan', [
            'kegiatan' => $kegiatan
        ]);
    }


}
