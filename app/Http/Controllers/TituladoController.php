<?php

namespace App\Http\Controllers;

use App\Titulado;
use Illuminate\Http\Request;
use App\User;
class TituladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulados = Titulado::all();
        return view('titulado.index',compact('titulados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $egresados = User::all()->where('tipo',1);
        return view('titulado.create',compact('egresados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function show(Titulado $titulado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulado $titulado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulado $titulado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulado $titulado)
    {
        //
    }
}
