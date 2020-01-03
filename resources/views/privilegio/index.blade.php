@extends('template')
@section('style')

@endsection
@section('title')

@endsection
@section('content')
<div class="row">
               <div class="col">
                  <!-- START card-->
                  <div class="card card-default">
                     <div class="card-header">
                      <div class="d-flex bd-highlight mb-3">
                        <div class="mr-auto p-2 bd-highlight">Lista de roles</div>
                        <div class="p-2 bd-highlight">
                          <a href="{{ route('privilegio.create') }}" class="btn btn-primary">Registrar</a>
                        </div>
                      </div>
                    </div>
                     <div class="card-body">
                        <!-- START table-responsive-->
                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                 </tr>
                              </thead>
                              <tbody>
                                    @foreach($roles as $rol)
                                        <tr>
                                            <td>{{$rol->id}}</td>
                                            <td>{{$rol->nombre}}</td>
                                            <td>
                                                <a class="badge badge-warning" href="{{route('privilegio.edit',$rol->id)}}">
                                                  Editar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                              </tbody>
                           </table>
                        </div><!-- END table-responsive-->
                     </div>
                  </div><!-- END card-->
               </div>
            </div>
@endsection
@section('script')

@endsection