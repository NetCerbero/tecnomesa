<?php

use Illuminate\Database\Seeder;
use App\Paquete;

class PaquetesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id = 1
        Paquete::create([
        	'nombre' => 'Administración',
        	'icon' => 'fa fa-edit'
        ]);
        //id = 2
        Paquete::create([
        	'nombre' => 'Egresados',
        	'icon' => 'fa fa-edit'
        ]);
        //id = 3
        Paquete::create([
        	'nombre' => 'Titulados',
        	'icon' => 'fa fa-edit'
        ]);
        //id = 4
        Paquete::create([
        	'nombre' => 'Estadistica',
        	'icon' => 'fa fa-edit'
        ]);
    }
}
