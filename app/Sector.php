<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['sector'];

    function empresa(){
    	return $this->hasMany('App\Empresa','sector_id','id');
    }
}
