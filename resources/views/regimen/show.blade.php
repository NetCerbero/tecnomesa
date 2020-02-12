@extends('template')
@section('style')
<style>
    .text-center{
        text-align: justify !important;
    }
</style>
@endsection
@section('title')
<h3>Regimen {{ $regimen->tipo }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">
                <p><strong>Nombre Regimen:</strong> {{ $regimen->tipo }}</p>    
             </div>
             <div class="card-footer d-flex">
               
             </div>
          </div>
       </div>

@endsection
@section('script')

@endsection
