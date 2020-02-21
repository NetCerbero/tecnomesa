<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use App\NivelPuesto;
use App\Area;
use App\Empresa;
use App\Titulado;
use App\Estadistica;

class EmpleadoController extends Controller
{
    private $id = 12;
    public function estadisticas(){
        $est = Estadistica::find($this->id);
        $est->visto = $est->visto + 1;
        $est->save();
        return $est->visto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $contador = $this->estadisticas();
        return view('empleado.index',compact('empleados','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        $nivelPuestos = NivelPuesto::all();
        $titulados = Titulado::all();
        $areas = Area::all()->where('tipo',2);
        $contador = $this->estadisticas();
        return view('empleado.create',compact('empresas','nivelPuestos','areas','titulados','contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empleado::create($request->all());
        $this->estadisticas();
        return redirect()->route('inflaboral.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        $contador = $this->estadisticas();
        return view('empleado.show', compact('empleado','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $empresas = Empresa::all();
        $nivelPuestos = NivelPuesto::all();
        $titulados = Titulado::all();
        $areas = Area::all()->where('tipo',2);
        $contador = $this->estadisticas();
        return view('empleado.edit',compact('empresas','nivelPuestos','areas','titulados','contador','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        Empleado::find($id)->update($request->all());
        $this->estadisticas();
        return redirect()->route('inflaboral.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        $this->estadisticas();
        return redirect()->route('inflaboral.index');
    }
}
