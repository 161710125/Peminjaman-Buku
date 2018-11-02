<?php

namespace App\Http\Controllers;

use App\pinjamkbl;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use App\buku;
use App\anggota;
use Carbon\Carbon;

class PinjamkblController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){
        $data = pinjamkbl::all();
        return DataTables::of($data)

        ->addColumn('buku',function($data){
            return $data->Buku->judul;
        })
        
        ->addColumn('anggota',function($data){
            return $data->Anggota->namaagt;
        })

        ->addColumn('action',function($data){
                return '<center><a href="#" class="btn btn-xs btn-primary edit" data-id="'.$data->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a></center>';
            })
        ->rawColumns(['action','buku','anggota'])->make(true);
    }

    public function index()
    {
        $pinjam = pinjamkbl::all();
        $anggota = anggota::all();
        $buku = buku::all();
        return view('pinjam.index', compact('pinjam','anggota','buku'));
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
        $this->validate($request, [
            'nopjkb'=>'required',
            'tglpjm'=>'required',
            'id_agt'=>'required',
            'id_buku'=>'required',
            'tglhrskbl'=>'required'
        ],[
            'nopjkb.required'=>'Nomor Pinjam tidak boleh kosong',
            'tglpjm.required'=>'Tanggal Kembali tidak boleh kosong',
            'id_agt.required'=>'Anggota tidak boleh kosong',
            'id_buku.required'=>'Buku tidak boleh kosong',
            'tglhrskbl.required'=>'tglhrskbl tidak boleh kosong'
    ]);
            $data = new pinjamkbl;
            $data->nopjkb = $request->nopjkb;
            $data->id_agt = $request->id_agt;
            $data->id_buku = $request->id_buku;
            $data->tglpjm = $request->tglpjm;
            $data->tglhrskbl = $request->tglhrskbl;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pinjamkbl  $pinjamkbl
     * @return \Illuminate\Http\Response
     */
    public function show(pinjamkbl $pinjamkbl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pinjamkbl  $pinjamkbl
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pinjamkbl::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pinjamkbl  $pinjamkbl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nopjkb'=>'required',
            'tglpjm'=>'required',
            'id_agt'=>'required',
            'id_buku'=>'required',
            'tglhrskbl'=>'required'
        ],[
            'nopjkb.required'=>'Nomor Pinjam tidak boleh kosong',
            'tglpjm.required'=>'Tanggal Kembali tidak boleh kosong',
            'id_agt.required'=>'Anggota tidak boleh kosong',
            'id_buku.required'=>'Buku tidak boleh kosong',
            'tglhrskbl.required'=>'tglhrskbl tidak boleh kosong'
    ]);
            $data = pinjamkbl::find($id);
            $data->nopjkb = $request->nopjkb;
            $data->id_agt = $request->id_agt;
            $data->id_buku = $request->id_buku;
            $data->tglpjm = $request->tglpjm;
            $data->tglhrskbl = $request->tglhrskbl;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pinjamkbl  $pinjamkbl
     * @return \Illuminate\Http\Response
     */
    public function destroy(pinjamkbl $pinjamkbl)
    {
        //
    }
}
