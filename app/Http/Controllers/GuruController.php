<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::paginate('7');
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create');
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




      Guru::create([
        'nama' => $request->nama,

        'gambar' => $request->file('gambar')->store('guru'),



      ]);
            return redirect()->route('adminguru.index')->with('success','Data Berhasil disimpan');
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
        $guru = Guru::find($id);

        return view('admin.guru.edit', ['guru' => $guru]);
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

            $guru = Guru::find($id);
            $guru->update([
                'nama' => $request->nama,


            ]);

            return redirect()->route('adminguru.index')->with('success','Data Berhasil diedit');

        }else {

            $guru = Guru::find($id);
            Storage::delete($guru->gambar);
            $guru->update([
                'nama' => $request->nama,

                'gambar' => $request->file('gambar')->store('guru')
            ]);
            return redirect()->route('adminguru.index')->with('success','Data Berhasil diedit');
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
        $guru = Guru::find($id);

        Storage::delete($guru->gambar);

        $guru->delete();
        return redirect()->route('adminguru.index')->with('success','Data Berhasil dihapus');
    }
}
