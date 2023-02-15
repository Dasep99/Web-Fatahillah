<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profile::paginate('7');
        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profil.create');
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




      Profile::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,


      ]);
            return redirect()->route('adminprofil.index')->with('success','Data Berhasil disimpan');
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
        $profil = Profile::find($id);

        return view('admin.profil.edit', ['profil' => $profil]);
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
        $profil = Profile::find($id)->update($request->all());

        return redirect()->route('adminprofil.index')->with('success','Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profile::find($id);

        $profil->delete();
        return redirect()->route('adminprofil.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_profil_admin($id)
    {
        $profil = Profile::where('id', $id)->first();

        return view('admin.profil.detailprofil', [
            'profil' => $profil
        ]);
    }
}

