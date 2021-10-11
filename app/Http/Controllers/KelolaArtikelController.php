<?php

namespace App\Http\Controllers;

use App\KelolaArtikel;
use Illuminate\Http\Request;

class KelolaArtikelController extends Controller
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
        $data = KelolaArtikel::all();
        return view('dataArtikel', ['data' => $data]);
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
        // $data = new KelolaArtikel;
        // $data->judul = $request->judul;
        // $data->penerbit = $request->penerbit;
        // $data->deskripsi = $request->deskripsi;
        // $data->gambar = $request->gambar;

        // $data->save();

        // KelolaArtikel::create([
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
        KelolaArtikel::create($request->all());

        return redirect('/universitas')->with('status', 'Tambah Data Artikel Berhasil');
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
        KelolaArtikel::where('id', $id)
            ->update([
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
            'link' => $request->link
        ]);
        return redirect('/universitas')->with('update', 'Ubah Data Artikel Berhasil');
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
        KelolaArtikel::destroy($id);
        return redirect('/dataArtikel')->with('hapus', 'Hapus Data Artikel Berhasil');
    }
}
