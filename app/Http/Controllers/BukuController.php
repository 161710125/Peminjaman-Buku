<?php

namespace App\Http\Controllers;

use App\buku;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use App\jnbuku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){
        $data = buku::all();
        return DataTables::of($data)
        
        ->addColumn('jenis',function($data){
            return $data->Jenis->jenis;
        })

        ->addColumn('action',function($data){
                return '<center><a href="#" class="btn btn-xs btn-primary edit" data-id="'.$data->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <a href="#" class="btn btn-xs btn-danger delete" id="'.$data->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a></center>';
            })

        ->rawColumns(['action','jenis'])->make(true);
    }

    public function index()
    {
        $buku = jnbuku::all();
        return view('buku.index',compact('buku'));
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

    /**`judul`, `pengarang`, `isbn`, `thnterbit`, `penerbit`, `tersedia`
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_jb'=>'required',
            'judul'=>'required',
            'pengarang'=>'required',
            'isbn'=>'required',
            'thnterbit'=>'required',
            'penerbit'=>'required',
            'tersedia'=>'required'
        ],[
            'id_jb.required'=>'Jenis tidak boleh kosong',
            'judul.required'=>'Judul tidak boleh kosong',
            'pengarang.required'=>'Pengarang tidak boleh kosong',
            'isbn.required'=>'ISBN tidak boleh kosong',
            'thnterbit.required'=>'Tahun Terbit tidak boleh kosong',
            'penerbit.required'=>'Penerbit tidak boleh kosong',
            'tersedia.required'=>'Tersedia tidak boleh kosong'
    ]);
            $data = new buku;
            $data->id_jb = $request->id_jb;
            $data->judul = $request->judul;
            $data->pengarang = $request->pengarang;
            $data->isbn = $request->isbn;
            $data->thnterbit = $request->thnterbit;
            $data->penerbit = $request->penerbit;
            $data->tersedia = $request->tersedia;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = buku::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_jb'=>'required',
            'judul'=>'required',
            'pengarang'=>'required',
            'isbn'=>'required',
            'thnterbit'=>'required',
            'penerbit'=>'required',
            'tersedia'=>'required'
        ],[
            'id_jb.required'=>'Jenis tidak boleh kosong',
            'judul.required'=>'Judul tidak boleh kosong',
            'pengarang.required'=>'Pengarang tidak boleh kosong',
            'isbn.required'=>'ISBN tidak boleh kosong',
            'thnterbit.required'=>'Tahun Terbit tidak boleh kosong',
            'penerbit.required'=>'Penerbit tidak boleh kosong',
            'tersedia.required'=>'Tersedia tidak boleh kosong'
    ]);
            $data = buku::find($id);
            $data->id_jb = $request->id_jb;
            $data->judul = $request->judul;
            $data->pengarang = $request->pengarang;
            $data->isbn = $request->isbn;
            $data->thnterbit = $request->thnterbit;
            $data->penerbit = $request->penerbit;
            $data->tersedia = $request->tersedia;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = buku::find($request->input('id'));
        if($data->delete())
        {
            echo 'Data Deleted';
        }
    }
}
