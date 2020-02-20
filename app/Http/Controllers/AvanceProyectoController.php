<?php

namespace App\Http\Controllers;

use App\AvanceProyecto;
use App\Graduacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Estadistica;

class AvanceProyectoController extends Controller
{
    private $id = 7;

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
        $graduaciones = Graduacion::all()->where('tipo','3');
        $contador = $this->estadisticas();
        return view('avanceproyecto.index',compact('graduaciones','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = Storage::putFile('public/avance', $request->file('file'));
            $data = $request->all();
            $data['file'] = $path;
            AvanceProyecto::create($data);
            $this->estadisticas();
            return redirect()->route('avance.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $graduacion = Graduacion::find($id);
        $contador = $this->estadisticas();
        return view('avanceproyecto.show',compact('graduacion','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $graduacion = Graduacion::find($id);
        $contador = $this->estadisticas();
        return view('avanceproyecto.create',compact('id','graduacion','contador'));
    }

    public function revisar($id){
        $graduacion = Graduacion::find($id);
        $contador = $this->estadisticas();
        return view('avanceproyecto.edit',compact('id','graduacion','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $avance = AvanceProyecto::find($id);
        $avance->update($request->all());
        $this->estadisticas();
        return redirect()->route('avance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $this->estadisticas();
    }

    // public function getDownload()
    // {
    //     //PDF file is stored under project/public/download/info.pdf
    //     $file= public_path(). "/download/info.pdf";

    //     $headers = array(
    //               'Content-Type: application/pdf',
    //             );

    //     return Response::download($file, 'filename.pdf', $headers);
    // }
}
