<?php

namespace App\Http\Controllers;

use App\KelolaYoutube;
use Illuminate\Http\Request;

class KelolaYoutubeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KelolaYoutube::all();
        return view('dataYoutube', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new KelolaYoutube;
        // $data->judul = $request->judul;
        // $data->penerbit = $request->penerbit;
        // $data->deskripsi = $request->deskripsi;
        // $data->gambar = $request->gambar;

        // $data->save();

        // KelolaYoutube::create([
        //     'judul' => $request->judul,
        //     'penerbit' => $request->penerbit,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $request->gambar
        // ]);
        $validated = $request->validate([
            'judul' => 'required',
            'penerbit' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'link' => 'required'
        ]);
        KelolaYoutube::create($request->all());

        return redirect('/dataYoutube')->with('status', 'Tambah Data Youtube Berhasil');
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
        //
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
        KelolaYoutube::where('id', $id)
            ->update([
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
            'link' => $request->link
        ]);
        return redirect('/dataYoutube')->with('update', 'Ubah Data Youtube Berhasil');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KelolaYoutube::destroy($id);
        return redirect('/dataYoutube')->with('hapus', 'Hapus Data Youtube Berhasil');
    }
}
