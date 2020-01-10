@extends('template')
@section('style')

@endsection
@section('title')
<h3>Registro de avance de proyecto</h3>
@endsection
@section('content')

<div class="row">
    @foreach ($graduacion->avanceProyecto as $avance)
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">
                {{-- <img class="mb-2 img-fluid rounded-circle thumb64" src="img/user/02.jpg" alt="Contact"> --}}
                <p><strong>Descripción:</strong> {{ $avance->descipcion }}</p>
                <p><strong>Comentario:</strong> {{ $avance->comentario }}</p>
                <p><strong>Estado: </strong> 
                    @if ($avance->estado_id == 1)
                        Regular
                    @elseif($avance->estado_id == 2)
                        Bueno
                    @elseif($avance->estado_id == 3)
                        Muy bueno
                    @elseif($avance->estado_id == 4)
                        Excelente
                    @endif
                </p>
                <p><strong>Tutor:</strong> {{ $graduacion->tutor->nombre.' '.$graduacion->tutor->apellido.' - '.$graduacion->tutor->registro }}</p>
                <p><strong>Titulo:</strong> {{ $graduacion->titulo }}</p>
             </div>
             <div class="card-footer d-flex">
                Visto {{ date('d/m/Y', strtotime($avance->updated_at)) }}
             </div>
          </div>
       </div>
    @endforeach
</div>

@endsection
@section('script')

@endsection