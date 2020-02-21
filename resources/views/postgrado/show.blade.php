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
   $datos = Auth::user()->userDataUagrm($postgrado->titulado->egresado->registro);
 @endphp
<h3>Titulado  {{ $datos['datos']['nombre'] }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">

             
               
                <p><strong>Registro:</strong> {{ $postgrado->titulado->egresado->registro }}</p>
                <p><strong>Nombre Titulado:</strong> {{ $datos['datos']['nombre'] }}</p>
                <p><strong>Año titulación universitaria:</strong> {{ $postgrado->titulado->anio_titulacion }}</p>
                <p><strong>Grado:</strong> {{ $postgrado->gradoTitulo->grado }}</p>
                <p><strong>Título:</strong> {{ $postgrado->titulo }}</p>
                  

             </div>
             <div class="card-footer d-flex"></div>
          </div>
        </div>
   
</div>

@endsection
@section('script')

@endsection
