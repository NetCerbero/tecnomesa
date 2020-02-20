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
       $datos = $graduacion->egresado->userDataUagrm($graduacion->egresado->registro);
 @endphp
<h3>Egresado  {{ $datos['datos']['nombre'] }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">

             
               
                <p><strong>Registro:</strong> {{ $graduacion->egresado->registro }}</p>
                <p><strong>Nombre estudiante:</strong> {{ $datos['datos']['nombre'] }}</p>
                 @switch ($graduacion->tipo)
                   @case(1)
                    Graduación directa
                    @break 
                   
                   @case(2)
                    Examen de grado
                    @break

                   @case(3)
                    <p><strong>Tutor:</strong> {{ $graduacion->tutor->nombre. ' ' .$graduacion->tutor->apellido.' - '.$graduacion->tutor->registro }}</p>
                    <p><strong>Titulo graduacion:</strong> {{ $graduacion->titulo }}</p>
                     <p><strong>Area :</strong>{{ $graduacion->area->area }}</p>
                     @break
                  @endswitch

             </div>
             <div class="card-footer d-flex">
               
             </div>
          </div>
       </div>
   
</div>

@endsection
@section('script')

@endsection
