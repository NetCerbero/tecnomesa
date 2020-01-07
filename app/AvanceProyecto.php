<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvanceProyecto extends Model
{
	use SoftDeletes;
    protected $fillable = [
    	'descipcion','file','comentario','estado_id',
    	'guia_id','trabajo_id'
    ];

 	public function proyecto(){
         return $this->belongsTo('App\Graduacion','trabajo_id');
    }

}
