<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    public function kategori() {
    	return $this->belongsTo('App\Kategori');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
