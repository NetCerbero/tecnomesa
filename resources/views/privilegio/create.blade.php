@extends('template')
@section('style')

@endsection
@section('title')
<h2>Administración de privilegios</h2>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Privilegios</div>
            <div class="card-body">
            <form method="POST" action="{{route('privilegio.store')}}">
                @csrf
                @PUT
                <div class="form-group">
                    <label>Rol</label>
                    <select name="rol" class="form-control">
                        @foreach($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>FUncionalidades</th>
                                    <th>Leer</th>
                                    <th>Escribir</th>
                                    <th>Eliminar</th>
                                    <th>Editar</th>
                                 </tr>
                              </thead>
                              <tbody>
                                    @for($i = 0; $i < count($cus); $i++)
                                        <tr>
                                            <td>{{$cus[$i]->id}}</td>
                                            <td>{{$cus[$i]->nombre}}</td>
                                            <td>
                                                <select name="data[{{$cus[$i]->id}}][leer]" id="" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="data[{{$cus[$i]->id}}][escribir]" id="" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="data[{{$cus[$i]->id}}][eliminar]" id="" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="data[{{$cus[$i]->id}}][editar]" id="" class="form-control">
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endfor
                              </tbody>
                           </table>
                        </div>
                <div class="d-flex justify-content-end mt-2">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
            </div>
        </div><!-- END card-->
    </div>
</div><!-- END row-->
@endsection
@section('script')

@endsection