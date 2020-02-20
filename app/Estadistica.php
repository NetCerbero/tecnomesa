<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    protected $fillable = [
    	'visto',
    	'eliminar',
    	'escribir',
    	'editar',
    	'visualizar',
    	'cu_id'
    ];

    public function cu(){
    	return $this->belongsTo('App\Cu','cu_id');
    }
}
