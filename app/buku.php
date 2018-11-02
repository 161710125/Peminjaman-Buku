<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $fillable=array('id_jb','judul','pengarang','isbn','thnterbit','penerbit','tersedia');
    public 	  $timestamp = true;

    public function Jenis(){
    	return $this->belongsTo('App\jnbuku','id_jb');
    }

    public function Pinjam(){
    	return $this->hasMany('App\pinjamkbl','id_buku');
    }
}