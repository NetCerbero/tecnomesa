<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //estudiante egresado
        User::Create([
        	'telefono' => '68912826',
        	'email' => 'isabel@gmail.com',
        	'password' => Hash::make('123'),
        	'registro' => '212049194',
        	'tipo' => 1,
        	'rol_id' => 1
        ]);

        //tribunal
        User::Create([
        	'nombre' => 'Gino',
        	'apellido' => 'Barroso Viruez',
        	'telefono' => '69354289',
        	'email' => 'gino@gmail.com',
        	'password' => Hash::make('123'),
        	'registro' => '215049965',
        	'genero' => 'M',
        	'tipo' => 2,
        	'rol_id' => 2
        ]);

        //docente
        User::Create([
        	'nombre' => 'Juan',
        	'apellido' => 'Alcachofa Picante',
        	'telefono' => '69189657',
        	'email' => 'juan@gmail.com',
        	'password' => Hash::make('123'),
        	'registro' => '215040085',
        	'genero' => 'M',
        	'tipo' => 3,
        	'rol_id' => 3
        ]);

    	//administrador
        User::Create([
        	'nombre' => 'Luis Yerko',
        	'apellido' => 'Laura Tola',
        	'telefono' => '69131148',
        	'email' => 'luis@gmail.com',
        	'password' => Hash::make('123'),
        	'registro' => '215049063',
        	'genero' => 'M',
        	'tipo' => 4,
        	'rol_id' => 4
        ]);
    }
}
