@extends('template')
@section('style')
<style>
    .text-center{
        text-align: justify !important;
    }
</style>
@endsection
@section('title')
<h3>Usuario  {{ $user->nombre }}</h3>
@endsection
@section('content')

<div class="row">
  
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">
             
                <p><strong>Registro:</strong>{{$user->registro}}</p>
                <p><strong>Nombre:</strong> {{$user->nombre}}</p>
                <p><strong>Apellido:</strong> {{$user->apellido}}</p>
                <p><strong>Email:</strong> {{$user->email}}</p>
                <p><strong>Contraseña:</strong> {{$user->password}}</p>
                <p><strong>Genero:</strong> {{$user->genero}}</p>
                <p><strong>Rol:</strong> {{$user->rol->nombre}}</p>
                </div>
                
               
                    
             </div>
             <div class="card-footer d-flex">
               
             </div>
          </div>
       </div>
   
</div>

@endsection
@section('script')

@endsection
