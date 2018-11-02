<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    protected $fillable=array('noagt', 'namaagt', 'alamat', 'kota', 'telp');
    public 	  $timestamp = true;

    public function Anggota1(){
    	return $this->hasMany('App\pinjamkbl','id_agt');
    }
}
