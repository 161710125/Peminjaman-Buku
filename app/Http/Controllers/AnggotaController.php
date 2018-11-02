<?php

namespace App\Http\Controllers;

use App\anggota;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\DataTables\Datatables;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function json(){
        $data = anggota::all();
        return Datatables::of($data)
        ->addColumn('action',function($data){
                return '<center><a href="#" class="btn btn-xs btn-primary edit" data-id="'.$data->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <a href="#" class="btn btn-xs btn-danger delete" id="'.$data->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a></center>';
            })
            ->rawColumns(['action'])->make(true);
    }
    
    public function index()
    {
        return view('anggota.index');
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
            'noagt'=>'required',
            'namaagt'=>'required',
            'alamat'=>'required',
            'kota'=>'required',
            'telp'=>'required'
        ],[
            'noagt.required'=>'No Anggota tidak boleh kosong',
            'namaagt.required'=>'Nama Anggota tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong',
            'kota.required'=>'Kota tidak boleh kosong',
            'telp.required'=>'Nomor Handphone tidak boleh kosong'
    ]);
            $data = new anggota;
            $data->noagt = $request->noagt;
            $data->namaagt = $request->namaagt;
            $data->alamat = $request->alamat;
            $data->kota = $request->kota;
            $data->telp = $request->telp;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = anggota::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'noagt'=>'required',
            'namaagt'=>'required',
            'alamat'=>'required',
            'kota'=>'required',
            'telp'=>'required'
        ],[
            'noagt.required'=>'No Anggota tidak boleh kosong',
            'namaagt.required'=>'Nama Anggota tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong',
            'kota.required'=>'Kota tidak boleh kosong',
            'telp.required'=>'Nomor Handphone tidak boleh kosong'
    ]);
            $data = anggota::find($id);
            $data->noagt = $request->noagt;
            $data->namaagt = $request->namaagt;
            $data->alamat = $request->alamat;
            $data->kota = $request->kota;
            $data->telp = $request->telp;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = anggota::find($request->input('id'));
        if($data->delete())
        {
            echo 'Data Deleted';
        }
    }
}
