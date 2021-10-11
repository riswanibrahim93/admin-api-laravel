<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class ArtikelAPIController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
        if (count($data) > 0) {
            return response()->json([
                'status' => 1,
                'data' => $data
            ],201);
        } else {
            return response()->json([
                'status' => 0,
                'data' => 'kosong'
            ],404);
        }
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
        $data = new Artikel;
        $data->judul = $request->judul;
        $data->penerbit = $request->penerbit;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $request->gambar;
        $data->link = $request->link;
        $data->save();

        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => 'Success Input Data'
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'Failed Input Data'
            ],404);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Artikel::find($id);
        if ($data) {
            $data->judul = $request->judul;
            $data->penerbit = $request->penerbit;
            $data->deskripsi = $request->deskripsi;
            $data->gambar = $request->gambar;
            $data->link = $request->link;
            $data->save();
            return response()->json([
                'status' => 1,
                'data' => 'Success Ubah Data'
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'Failed Ubah Data'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Artikel::find($id);
        if ($data) {
             $data->delete();
             return response()->json([
                'status' => 1,
                'data' => 'delete success'
            ],201);
        } else {
             return response()->json([
                'status' => 0,
                'data' => 'Id not found'
            ],404);
        }
    }
}
