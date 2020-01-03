<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'foto', 'email',
        'password', 'registro', 'genero', 'tipo', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function rol(){
         return $this->hasOne('App\Rol', 'id','rol_id');
    }

    public function menu(){
        $rsp = [];
        $cus = $this->rol->cu;
        foreach ($cus as $cu) {
            $paquete = $cu->paquete;
            // verificar los permisos para determinar si se muestra o no el paquete y el cu
            if(array_key_exists($paquete->nombre,$rsp)){
                $rsp[$paquete->nombre]['cus'][] = $cu;
            }else{
                $rsp[$paquete->nombre] = ['icon' => $paquete->icon, 'id' => $paquete->id, 'cus' => [$cu]];
            }
        }
        return $rsp;
    }

}
