@extends('template')
@section('style')
<style>
    .text-center{
        text-align: justify !important;
    }
</style>
@endsection
@section('title')
 @php
   $datos = Auth::user()->userDataUagrm($titulado->egresado->registro);
 @endphp
<h3>Titulado  {{ $datos['datos']['nombre'] }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">

             
               
                <p><strong>Registro:</strong> {{ $titulado->egresado->registro }}</p>
                <p><strong>Nombre Titulado:</strong> {{ $datos['datos']['nombre'] }}</p>
                <p><strong>Año titulacion:</strong> {{ $titulado->anio_titulacion }}</p>

                 @switch ($titulado->egresado->graduacion->tipo)
                   @case(1)
                    <strong>Modalidad:</strong> Graduación directa
                    @break 
                   
                   @case(2)
                    <strong>Modalidad:</strong> Examen de grado
                    @break

                   @case(3)
                   <strong> Modalidad:</strong> Tesis/Trabajo Final/Trabajo Dirigido
                    <p><strong>Titulo graduacion:</strong> {{ $titulado->egresado->graduacion->titulo }}</p>
                     <p><strong>Area :</strong>{{ $titulado->egresado->graduacion->area->area }}</p>
                     @break
                  @endswitch

                  

             </div>
             <div class="card-footer d-flex"></div>
          </div>
        </div>
   
</div>

@endsection
@section('script')

@endsection
