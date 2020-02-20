<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
	use SoftDeletes;
    protected $fillable = ['sector'];

    function empresa(){
    	return $this->hasMany('App\Empresa','sector_id','id');
    }
}
