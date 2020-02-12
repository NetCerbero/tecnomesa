@extends('template')
@section('style')
<style>
    .text-center{
        text-align: justify !important;
    }
</style>
@endsection
@section('title')
<h3>Empresa {{ $empresa->nombre }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">
             
                <p><strong>Empresa:</strong> {{ $empresa->nombre }}</p>
                <p><strong>Direccion:</strong> {{ $empresa->direccion }}</p>
                <p><strong>Telefono:</strong> {{ $empresa->telefono }}</p>
                <p><strong>Sector:</strong> {{ $empresa->sector->sector }}</p>
                <p><strong>Regimen:</strong> {{ $empresa->regimen->tipo }}</p>
                    
             </div>
             <div class="card-footer d-flex">
               
             </div>
          </div>
       </div>
   
</div>

@endsection
@section('script')

@endsection
