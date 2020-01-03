@extends('template')
@section('style')

@endsection
@section('title')
<h2>Gestión de roles</h2>
@endsection
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-primary" href="{{route('rol.create')}}">
        <i class="fa fa-book"></i> Registrar
    </a>
</div>
<div class="row">
               <div class="col">
                  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header">
                         <h3>Lista de roles</h3>
                         <hr>
                         <a href="{{route('rol.create')}}" class="btn btn-success">
                             Registrar nuevo rol
                         </a>
                     </div>
                     <div class="card-body">
                        <!-- START table-responsive-->
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Rol</th>
                                    <th>Abreviatura</th>
                                    <th>Acciones</th>
                                 </tr>
                              </thead>
                              <tbody>
                                    @foreach($roles as $rol)
                                        <tr>
                                            <td>{{$rol->id}}</td>
                                            <td>{{$rol->nombre}}</td>
                                            <td>{{$rol->abreviacion}}</td>
                                            <td>
                                                <a href="{{route('rol.edit',$rol->id)}}"> editar </a>
                                            </td>
                                        </tr>
                                    @endforeach
                              </tbody>
                           </table>
                        </div><!-- END table-responsive-->
                     </div>
                  </div><!-- END card-->
               </div>
            </div><!-- END row-->

@endsection
@section('script')

@endsection