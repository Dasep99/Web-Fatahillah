<?php

namespace App\Http\Controllers;

use DB;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::paginate('7');
        return view('admin.file.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'file' => 'required|mimes:pdf,csv,xls,xlsx,doc,docx',

        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();


        File::create([
            'nama' => $request->nama,
            'file' => $request->file('file')->store('file'),



          ]);
             return redirect()->route('file.index')->with('success','Data Berhasil disimpan');


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
        $file = File::find($id);

        return view('admin.file.edit', ['file' => $file]);
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
        if (empty($request->file('file'))) {

            $file = File::find($id);
            $file->update([
                'nama' => $request->nama,

            ]);

            return redirect()->route('file.index')->with('success','Data Berhasil diedit');

        }else {

            $file = File::find($id);
            Storage::delete($file->file);
            $file->update([
                'nama' => $request->nama,
                'file' => $request->file('file')->store('file')
            ]);
            return redirect()->route('file.index')->with('success','Data Berhasil diedit');
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
        $file = File::find($id);

        Storage::delete($file->file);

        $file->delete();

        return redirect()->route('file.index')->with('success','Data Berhasil dihapus');
    }

    public function downloadfile($file)
    {
         $file_path = public_path('uploads/'.$file);

           return Response::download($file_path);

    }

    public function detail_file_admin($id)
    {
        $file = File::where('id', $id)->first();

        return view('admin.file.detailfile', [
            'file' => $file
        ]);
    }
}
