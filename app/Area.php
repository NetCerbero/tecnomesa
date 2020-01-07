<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
    	'area','tipo'
    ];

    public function graduacion(){
    	return $this->hasOne('App\Graduacion', 'area_id');
    }
}
