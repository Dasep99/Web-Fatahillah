<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tentang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminTentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentang = tentang::paginate(7);

        return view('admin.tentang.index', compact('tentang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tentang.create');
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
            'gambar_tentang' => 'required',


        ]);




      tentang::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar_tentang' => $request->file('gambar_tentang')->store('tentang'),



      ]);
            return redirect()->route('admintentang.index')->with('success','Data Berhasil disimpan');

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
        $tentang = tentang::find($id);

        return view('admin.tentang.edit', ['tentang' => $tentang]);
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
        if (empty($request->file('gambar_tentang'))) {

            $tentang = tentang::find($id);
            $tentang->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

            ]);

            return redirect()->route('admintentang.index')->with('success','Data Berhasil diedit');

        }else {

            $tentang = tentang::find($id);
            Storage::delete($tentang->gambar_tentang);
            $tentang->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

                'gambar_tentang' => $request->file('gambar_tentang')->store('tentang')
            ]);
            return redirect()->route('admintentang.index')->with('success','Data Berhasil diedit');
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
        $tentang = tentang::find($id);

        Storage::delete($tentang->gambar_tentang);

        $tentang->delete();

        return redirect()->route('admintentang.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_tentang_admin($id)
    {
        $tentang = tentang::where('id', $id)->first();

        return view('admin.tentang.detailtentang', [
            'tentang' => $tentang
        ]);
    }
}
