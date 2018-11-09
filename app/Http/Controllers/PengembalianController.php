<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use App\pinjamkbl;
use App\buku;
use App\anggota; 
use Carbon\Carbon;

class PengembalianController extends Controller
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
        ->rawColumns(['buku','anggota'])->make(true);
    }

    public function ajax($id,Request $request)
    {
        $sub = pinjamkbl::find($id);
        $sub['agt']= $sub->Anggota->namaagt;
        $sub['uku']= $sub->Buku->judul;
        $sub['pjm']= $sub->tglpjm;
        $sub['hrs_kbl']= $sub->tglhrskbl;
        return $sub;
    }

    public function index()
    {
        $pinjam = pinjamkbl::where('tglkbl','=',null)->get();
        $anggota = anggota::all();
        $buku = buku::all();
        return view('pengembalian.index', compact('pinjam','anggota','buku'));
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
            'nopjkb' => 'required',
            'id_agt' => 'required',
            'id_buku' => 'required',
            'tglhrskbl' => 'required',
        ],[
            'nopjkb.required' => ':Attribute  Tidak Boleh Kosong',
            'id_buku.required' => ':Attribute  Tidak Boleh Kosong',
            'id_agt.required' => ':Attribute  Tidak Boleh Kosong',
            'tglhrskbl.required' => ':Attribute  Tidak Boleh Kosong',
        ]);
        $data = new pinjamkbl;
        $karbon = Carbon::now();
        $data->nopjkb = $request->nopjkb;
        $data->id_buku = $request->id_buku;
        $data->tglpjm = $request->tglpjm;
        $data->id_agt = $request->id_agt;
        $data->tglhrskbl = Carbon::now()->addDays(2)->format('Y-m-d');
        $data->tglkbl = $request->tglkbl;

        $awal = new Carbon($request->tglhrskbl);
        $akhir = new Carbon($request->tglkbl);
        $hasil= "{$awal->diffInDays($akhir)}";
        $data->denda= $hasil * 2000;

        $data->save();
        return response()->json(['success'=>true]);
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
        $data = pinjamkbl::findOrFail($id);
        return $data;
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
        $this->validate($request,[
            'tglkbl'=>'required'
        ],[
            'tglkbl.required'=> 'Penerebit harus diisi'
        ]);
            $pinjam = pinjamkbl::find($id);
            $pinjam->tglkbl = $request->tglkbl;

            $tanggal= new Carbon($pinjam->tglkbl);
            $kembali= new Carbon($pinjam->tglhrskbl);
            $all = $tanggal ->diffInDays($kembali);
            $pinjam->denda= $all*2000;

            if ($tanggal <= $kembali){
                $pinjam->denda = $all*0;
            }elseif ($tanggal > $kembali) {
                $pinjam->denda = $all*2000;
            }
            $pinjam->save();

            $stock = buku::where('id', $pinjam->id_buku)->first();
            $stock->tersedia = $stock->tersedia + 1;
            $stock->save();

            $agt = anggota::where('id',$pinjam->id_agt)->first();
            $agt->status = $agt->status - 1;
            $agt->save();

            return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
