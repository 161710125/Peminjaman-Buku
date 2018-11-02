<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jnbuku extends Model
{
    protected $fillable=array('id_jb','jenis');
    public 	  $timestamp = true;

    public function Buku(){
       return $this->hasMany('App\buku', 'id_jb');
    } 
}
