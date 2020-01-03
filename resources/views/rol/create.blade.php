@extends('template')
@section('style')

@endsection
@section('title')
<h2>Creación de rol</h2>
@endsection
@section('content')
<div class="row">
               <div class="col">
                  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header">
                         <h3>Crear nuevo rol</h3>
                     </div>
                     <div class="card-body">
                        <form method="POST" action="{{route('rol.store')}}">
                            @csrf
                           <div class="form-group">
                               <label>Nombre del rol</label>
                               <input name="nombre" class="form-control" type="text" placeholder="Nombre del rol">
                            </div>
                            <div class="form-group">
                               <label>Abreviación</label>
                               <input name="abreviacion" class="form-control" type="text" placeholder="Abreviación del cu">
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                            </div>
                        </form>
                     </div>
                  </div><!-- END card-->
               </div>
            </div><!-- END row-->
@endsection
@section('script')

@endsection