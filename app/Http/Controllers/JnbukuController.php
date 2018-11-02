<?php

namespace App\Http\Controllers;

use App\jnbuku;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\DataTables\Datatables;

class JnbukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function json(){
        $data = jnbuku::all();
        return Datatables::of($data)
        ->addColumn('action',function($data){
                return '<center><a href="#" class="btn btn-xs btn-primary edit" data-id="'.$data->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <a href="#" class="btn btn-xs btn-danger delete" id="'.$data->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a></center>';
            })
            ->rawColumns(['action'])->make(true);
    }

    public function index()
    {
        return view('jenis.index');
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
            'jenis'=>'required'
        ],[
            'jenis.required'=>'Jenis tidak boleh kosong'
    ]);
            $data = new jnbuku;
            $data->jenis = $request->jenis;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jnbuku  $jnbuku
     * @return \Illuminate\Http\Response
     */
    public function show(jnbuku $jnbuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jnbuku  $jnbuku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = jnbuku::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jnbuku  $jnbuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis'=>'required'
        ],[
            'jenis.required'=>'Jenis tidak boleh kosong'
    ]);
            $data = jnbuku::find($id);
            $data->jenis = $request->jenis;
            $data->save();
            return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jnbuku  $jnbuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = jnbuku::find($request->input('id'));
        if($data->delete())
        {
            echo 'Data Deleted';
        }
    }
}
