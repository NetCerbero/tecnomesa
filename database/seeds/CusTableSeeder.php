<?php

use Illuminate\Database\Seeder;
use App\Cu;
class CusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cu::create([
        	'nombre' => 'Gestionar Usuarios',
        	'icon' => 'fa fa-user',
            'route' => 'usuario',
        	'paquete_id' => 1,
        ]);

        Cu::create([
        	'nombre' => 'Gestionar Empresa',
        	'icon' => 'fa fa-user',
            'route' => 'empresa',
        	'paquete_id' => 1,
        ]);

        Cu::create([
        	'nombre' => 'Gestionar Regimen',
        	'icon' => 'fa fa-user',
            'route' => 'regimen',
        	'paquete_id' => 1,
        ]);

        Cu::create([
        	'nombre' => 'Gestionar Sector',
        	'icon' => 'fa fa-user',
            'route' => 'sector',
        	'paquete_id' => 1,
        ]);

        Cu::create([
        	'nombre' => 'Adm. de privilegios',
        	'icon' => 'fa fa-user',
            'route' => 'privilegio',
        	'paquete_id' => 1,
        ]);

        //Egresados
        Cu::create([
        	'nombre' => 'Gestión de Egresados',
        	'icon' => 'fa fa-user',
            'route' => 'egresado',
        	'paquete_id' => 2,
        ]);

        Cu::create([
        	'nombre' => 'Gestionar A. Proyectos',
        	'icon' => 'fa fa-user',
            'route' => 'avance',
        	'paquete_id' => 2,
        ]);

        Cu::create([
        	'nombre' => 'Asignación de tutor y tribunal',
        	'icon' => 'fa fa-user',
            'route' => 'asignacion',
        	'paquete_id' => 2,
        ]);

        Cu::create([
        	'nombre' => 'Adm de evaluación',
        	'icon' => 'fa fa-user',
            'route' => 'evaluacion',
        	'paquete_id' => 2,
        ]);

        //Titulados
        Cu::create([
        	'nombre' => 'Gestionar titulados',
        	'icon' => 'fa fa-user',
            'route' => 'titulado',
        	'paquete_id' => 3,
        ]);

        Cu::create([
        	'nombre' => 'Gestionar Postgrado',
        	'icon' => 'fa fa-user',
            'route' => 'postgrado',
        	'paquete_id' => 3,
        ]);

        Cu::create([
        	'nombre' => 'Vinculación laboral',
        	'icon' => 'fa fa-user',
            'route' => 'inflaboral',
        	'paquete_id' => 3,
        ]);

        //Reportes
        Cu::create([
            'nombre' => 'Conteo de paginas',
            'icon' => 'fa fa-user',
            'route' => 'estadistica',
            'paquete_id' => 3,
        ]);
    }
}
