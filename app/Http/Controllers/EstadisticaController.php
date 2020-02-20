<?php

namespace App\Http\Controllers;

use App\Estadistica;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estadistica.estadisticas2018');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function show(Estadistica $estadistica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadistica $estadistica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadistica $estadistica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estadistica  $estadistica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadistica $estadistica)
    {
        //
    }
}
