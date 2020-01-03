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
            <form method="POST" action="{{route('privilegio.update',$rol->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Rol: {{$rol->nombre}}</label>
                    <input type="hidden" name="rol" value="{{$rol->id}}">
                </div>

                <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Funcionalidades</th>
                                    <th>Leer</th>
                                    <th>Escribir</th>
                                    <th>Eliminar</th>
                                    <th>Editar</th>
                                 </tr>
                              </thead>
                              <tbody>
                                    @foreach($cus as $cu)
                                        @php
                                            $vrf = $cu->pivot;
                                            
                                        @endphp
                                        <tr>
                                            <td>{{$cu->id}}</td>
                                            <td>{{$cu->nombre}}</td>
                                            <td>
                                                <select name="data[{{$cu->id}}][leer]" id="" class="form-control">
                                                    @if($vrf['leer'] == 1)
                                                        <option value="0">No</option>
                                                        <option value="1" selected>Si</option>
                                                    @else
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Si</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <select name="data[{{$cu->id}}][escribir]" id="" class="form-control">
                                                    @if($vrf['escribir'] == 1)
                                                        <option value="0">No</option>
                                                        <option value="1" selected>Si</option>
                                                    @else
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Si</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <select name="data[{{$cu->id}}][eliminar]" id="" class="form-control">
                                                    @if($vrf['eliminar'] == 1)
                                                        <option value="0">No</option>
                                                        <option value="1" selected>Si</option>
                                                    @else
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Si</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <select name="data[{{$cu->id}}][editar]" id="" class="form-control">
                                                    @if($vrf['editar'] == 1)
                                                        <option value="0">No</option>
                                                        <option value="1" selected>Si</option>
                                                    @else
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Si</option>
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
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