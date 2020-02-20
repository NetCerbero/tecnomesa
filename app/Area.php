<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'area','tipo'
    ];

    public function graduacion(){
    	return $this->hasOne('App\Graduacion', 'area_id');
    }
}
