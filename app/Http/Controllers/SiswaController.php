<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate('7');

        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
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
            'nama' => 'required|min:4',
            'gambar' => 'required',
        ]);




      Siswa::create([
        'nama' => $request->nama,

        'gambar' => $request->file('gambar')->store('siswa'),



      ]);
            return redirect()->route('adminsiswa.index')->with('success','Data Berhasil disimpan');
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
        $siswa = Siswa::find($id);

        return view('admin.siswa.edit', ['siswa' => $siswa]);
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

            $siswa = Siswa::find($id);
            $siswa->update([
                'nama' => $request->nama,


            ]);

            return redirect()->route('adminsiswa.index')->with('success','Data Berhasil diedit');

        }else {

            $siswa = Siswa::find($id);
            Storage::delete($siswa->gambar);
            $siswa->update([
                'nama' => $request->nama,

                'gambar' => $request->file('gambar')->store('siswa')
            ]);
            return redirect()->route('adminsiswa.index')->with('success','Data Berhasil diedit');
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
        $siswa = Siswa::find($id);

        Storage::delete($siswa->gambar);

        $siswa->delete();
        return redirect()->route('adminsiswa.index')->with('success','Data Berhasil dihapus');
    }
}
