@extends('template')
@section('style')
<style>
    .nota{
        font-size: 0.9em;
        color: #fd6a6a;
    }
</style>
@endsection
@section('title')
<h2>Edición de usuarios</h2>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Edición de usuario</div>
            <div class="card-body">
            <form method="POST" action="{{route('usuario.update',$user->id)}}">
                 @php
                       $datos = Auth::user()->userDataUagrm($user->registro);
                 @endphp
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nombre</label>
                    @if ($user->tipo == 1)
                        <p>{{ $datos['datos']['nombre'] }}</p>
                    @else
                        <input name="nombre" value="{{$user->nombre}}" class="form-control" type="text" placeholder="Ingrese el nombre">
                    @endif
                </div>
                @if ($user->tipo != 1)
                    <div class="form-group">
                        <label>Apellido</label>
                        <input name="apellido" value="{{$user->apellido}}" class="form-control" type="text" placeholder="Ingrese el apellido">
                    </div>
                @endif
                
                
                <div class="form-group">
                    <label>Genero</label>
                    @if ($user->tipo == 1)
                        <p>{{ $datos['datos']['sexo'] }}</p>
                    @else
                        <select name="genero" id="" class="form-control">
                        <option value="">Elija el genero</option>
                        @if($user->genero == 'm')
                            <option value="m" selected>Masculino</option>
                            <option value="f">Femenino</option>
                        @elseif($user->genero == 'f')
                            <option value="m">Masculino</option>
                            <option value="f" selected>Femenino</option>
                        @endif
                    </select>
                    @endif
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="{{$user->email}}" class="form-control" type="email" placeholder="Ingrese el correo">
                </div>

                <div class="form-group">
                    <label>Contraseña</label><br>
                    <span class="nota">Nota: Deje la casilla en blanco si no quiere cambiar la contraseña</span>
                    <input name="password" class="form-control" type="text" placeholder="Ingrese nueva contraseña">
                </div>

                
                
                @if($user->tipo == 1)
                    <div class="form-group">
                        <label>Registro</label>
                        <p>{{ $user->registro }}</p>
                    </div>
                @else
                    <div class="form-group">
                        <label>Registro</label>
                        <input name="registro" value="{{$user->registro}}" class="form-control" type="number" placeholder="registro de usuario">
                    </div>
                @endif
                <input name="tipo" class="form-control" type="hidden" value="{{$user->tipo}}">
                <div class="form-group">
                    <label>Nombre del rol</label>
                    <select name="rol_id" id=""  class="form-control">
                        <option value="">Elija el rol</option>
                        @foreach($roles as $rol)
                            @if($user->rol_id == $rol->id)
                                <option value="{{$rol->id}}" selected>{{$rol->nombre}}</option>
                            @else
                                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
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
