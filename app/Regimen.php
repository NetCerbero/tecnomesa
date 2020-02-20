<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regimen extends Model
{
	use SoftDeletes;
    protected $fillable = ['tipo'];

    function empresa(){
    	return $this->hasMany('App\Empresa','regimen_id','id');
    }
}
