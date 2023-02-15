<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::paginate(7);
        return view('admin.video.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
            'gambar_video' => 'required',

        ]);




        Video::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'video' => $request->file('video')->store('video'),
            'gambar_video' => $request->file('gambar_video')->store('gambar'),



          ]);
             return redirect()->route('adminvideo.index')->with('success','Data Berhasil disimpan');
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
        $video = Video::find($id);

        return view('admin.video.edit', ['video' => $video]);
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
        if (empty($request->file('gambar_informasi')) && empty($request->file('video')) ) {

            $video = Video::find($id);
            $video->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

            ]);

            return redirect()->route('adminvideo.index')->with('success','Data Berhasil diedit');

        }else {

            $video = Video::find($id);
            Storage::delete($video->gambar_video);
            Storage::delete($video->video);
            $video->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,

                'gambar_video' => $request->file('gambar_video')->store('gambar'),
                'video' => $request->file('video')->store('video')
            ]);
            return redirect()->route('adminvideo.index')->with('success','Data Berhasil diedit');
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
        $video = Video::find($id);

        Storage::delete($video->gambar_video);
        Storage::delete($video->video);

        $video->delete();

        return redirect()->route('adminvideo.index')->with('success','Data Berhasil dihapus');
    }

    public function detail_video_admin($id)
    {
        $video = Video::where('id', $id)->first();

        return view('admin.video.detailvideo', [
            'video' => $video
        ]);
    }
}
