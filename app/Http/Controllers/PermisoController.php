<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Cu;
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return view('privilegio.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        $cus = Cu::all();
        return view('privilegio.create',compact('roles','cus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = Rol::find($request['rol']);
        
        foreach($request['data'] as $key => $value ){
            $rol->cu()->syncWithoutDetaching(
                [
                    $key => $value
                ]
            );
        }

        return redirect()->route('privilegio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        $permiso = $this->permiso($rol->cu);
        $cus = Cu::all();
        return view('privilegio.edit',compact('rol','cus','permiso'));
    }

    public function permiso($data){
        $rsp = [];
        foreach ($data as $value) {
            $rsp[$value->id] = [
                        "leer" => $value->pivot->leer,
                        "escribir" => $value->pivot->escribir,
                        "editar" => $value->pivot->editar,
                        "eliminar" => $value->pivot->eliminar
                    ];
        }
        return $rsp;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);
        
        foreach($request['data'] as $key => $value ){
            $rol->cu()->syncWithoutDetaching(
                [
                    $key => $value
                ]
            );
        }
        return redirect()->route('privilegio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
