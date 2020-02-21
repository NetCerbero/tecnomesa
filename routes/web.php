<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

	Route::get('/home', 'HomeController@index')->name('home');

	// 1 
	Route::resource('usuario','UserController');
	Route::get('usuario/data/user/{reg}','UserController@getUserData')->name('user_api');

	Route::resource('empresa','EmpresaController');
    Route::get('empresaShow/{id}','EmpresaController@show')->name('empresa.show');
    Route::get('empresaDelete/{id}','EmpresaController@destroy')->name('empresa.delete');
    
	Route::resource('regimen','RegimenController');
    Route::get('regimenShow/{id}','RegimenController@show')->name('regimen.show');
	Route::get('regimenDelete/{id}','RegimenController@destroy')->name('regimen.delete');
    
	Route::resource('sector','SectorController');
    Route::get('sectorShow/{id}','SectorController@show')->name('sector.show');
	Route::get('sectorDelete/{id}','SectorController@destroy')->name('sector.delete');

	Route::resource('privilegio','PermisoController');
	Route::resource('rol','RolController');


	// 2
	Route::resource('egresado','GraduacionController');
	Route::get('egresado/data/user/{reg}','GraduacionController@getInfoUser')->name('graduacion_api');


	Route::resource('avance','AvanceProyectoController');
	Route::get('avance/revisar/{id}','AvanceProyectoController@revisar')->name('avance_revisar');

	Route::resource('asignacion','TribunalEvaluacionController');
	Route::get('asignacion/evaluacion/{id}','TribunalEvaluacionController@evaluacion')->name('asignacion_tutor');

	Route::resource('evaluacion','EvaluacionController');
	Route::get('evaluacion/crear/{id}','EvaluacionController@crear')->name('evaluacion_nota');
	// 3
	Route::resource('titulado','TituladoController');
	Route::resource('postgrado','PostgradoController');
	Route::resource('inflaboral','EmpleadoController');

	Route::resource('estadistica','EstadisticaController');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return "probemos";
});