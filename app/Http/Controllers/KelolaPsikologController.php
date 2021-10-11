<?php

namespace App\Http\Controllers;

use App\KelolaPsikolog;
use Illuminate\Http\Request;

class KelolaPsikologController extends Controller
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
        $data = KelolaPsikolog::all();
        return view('dataPsikolog', ['data' => $data]);
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
        $validated = $request->validate([
            'nama' => 'required',
            'bidang' => 'required',
            'tlv' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);
        KelolaPsikolog::create($request->all());

        return redirect('/dataPsikolog')->with('status', 'Tambah Data Psikolog Berhasil');
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
        KelolaPsikolog::where('id', $id)
            ->update([
            'nama' => $request->nama,
            'bidang' => $request->bidang,
            'tlv' => $request->tlv,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar
        ]);
        return redirect('/dataPsikolog')->with('update', 'Ubah Data Psikolog Berhasil');
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
        KelolaPsikolog::destroy($id);
        return redirect('/dataPsikolog')->with('hapus', 'Hapus Data Psikolog Berhasil');
    }
}
