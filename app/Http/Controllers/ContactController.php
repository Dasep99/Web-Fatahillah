<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::paginate('7');
        return view('admin.kontak.index',compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kontak.create');
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
            'alamat' => 'required|min:4',
            'email' => 'required',
            'telepon' => 'required',


        ]);




      Kontak::create([
        'alamat' => $request->alamat,
        'email' => $request->email,
        'telepon' => $request->telepon,



      ]);
            return redirect()->route('adminkontak.index')->with('success','Data Berhasil disimpan');
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
        $kontak = Kontak::find($id);

        return view('admin.kontak.edit', ['kontak' => $kontak]);
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
        $kontak = Kontak::find($id)->update($request->all());

        return redirect()->route('adminkontak.index')->with('success','Data Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = Kontak::find($id);

        $kontak->delete();

        return redirect()->route('adminkontak.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_kontak_admin($id)
    {
        $kontak = Kontak::where('id', $id)->first();

        return view('admin.kontak.detailkontak', [
            'kontak' => $kontak
        ]);
    }


}
