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
    $datos = Auth::user()->userDataUagrm($empleado->titulado->egresado->registro);
@endphp
<h3>Informacion laboral  {{ $datos['datos']['nombre'] }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">

             
               
                <p><strong>Nombre:</strong> {{ $titulado->egresado->registro }}</p>
                <p><strong>Empresa:</strong> {{ $empleado->empresa->nombre }}</p>
                <p><strong>Area: </strong> {{ $empleado->area->area }}</p>
                <p><strong>Funcion: </strong> {{ $empleado->funcion}}</p>
  

             </div>
             <div class="card-footer d-flex"></div>
          </div>
        </div>
   
</div>

@endsection
@section('script')

@endsection
