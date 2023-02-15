<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::paginate('5');

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fasilitas.create');
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
            'deskripsi' => 'required',


        ]);




      Fasilitas::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,

      ]);
        return redirect()->route('adminfasilitas.index')->with('success','Data Berhasil disimpan');
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
        $fasilitas = Fasilitas::find($id);

        return view('admin.fasilitas.edit', ['fasilitas' => $fasilitas]);
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
        $fasilitas = Fasilitas::find($id)->update($request->all());

        return redirect()->route('adminfasilitas.index')->with('success','Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);

        $fasilitas->delete();

        return redirect()->route('adminfasilitas.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_fasilitas_admin($id)
    {
        $fasilitas = Fasilitas::where('id', $id)->first();

        return view('admin.fasilitas.detailfasilitas', [
            'fasilitas' => $fasilitas
        ]);
    }
}
