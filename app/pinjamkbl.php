<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinjamkbl extends Model
{
    protected $fillable=array('nopjkb','id_agt','id_buku','tglpjm','tglhrskbl','tglkbl','denda');
    public 	  $timestamp = true;

    public function Anggota(){
    	return $this->belongsTo('App\anggota','id_agt');
    }

    public function Buku(){
    	return $this->belongsTo('App\buku','id_buku');
    }

}