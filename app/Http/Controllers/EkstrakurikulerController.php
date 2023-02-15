<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::paginate('6');
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ekstrakurikuler.create');
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


        ]);




      Ekstrakurikuler::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,


      ]);
            return redirect()->route('ekstrakurikuleradmin.index')->with('success','Data Berhasil disimpan');
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
        $ekstrakurikuler = Ekstrakurikuler::find($id);

        return view('admin.ekstrakurikuler.edit', ['ekstrakurikuler' => $ekstrakurikuler]);
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
        $ekstrakurikuler = Ekstrakurikuler::find($id)->update($request->all());

        return redirect()->route('ekstrakurikuleradmin.index')->with('success','Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);

        $ekstrakurikuler->delete();

        return redirect()->route('ekstrakurikuleradmin.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_ekstrakurikuler_admin($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::where('id', $id)->first();

        return view('admin.ekstrakurikuler.detailekstrakurikuler', [
            'ekstrakurikuler' => $ekstrakurikuler
        ]);
    }
}
