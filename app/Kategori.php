<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public function artikel() {
    	return $this->hasMany('App\Artikel');
    }

    public function indukkategori() {
    	return $this->belongsTo('App\IndukKategori');
    }
}
