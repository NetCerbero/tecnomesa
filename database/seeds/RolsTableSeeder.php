<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//id = 1
    	Rol::create([
    		'nombre' => 'Estudiante',
    		'icon' => 'fa fa-user'
    	]);

    	//id = 2
    	Rol::create([
    		'nombre' => 'Tribunal',
    		'icon' => 'fa fa-user'
    	]);

    	//id = 3
    	Rol::create([
    		'nombre' => 'Docente',
    		'icon' => 'fa fa-user'
    	]);

    	//id = 4
    	Rol::create([
    		'nombre' => 'Administrador',
    		'icon' => 'fa fa-user'
    	]);
    }
}
