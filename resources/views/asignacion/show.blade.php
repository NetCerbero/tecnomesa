@extends('template')
@section('style')
<style>
    .text-center{
        text-align: justify !important;
    }
</style>
@endsection
@section('title')
<h3>Tribunales</h3>
@endsection
@section('content')

<div class="row">
    @if ($graduacion->evaluacion)
       <div class="col-lg-4 col-sm-6">
          <div class="card card-default">
             <div class="card-header"></div>
             <div class="card-body text-center">
                {{-- <img class="mb-2 img-fluid rounded-circle thumb64" src="img/user/02.jpg" alt="Contact"> --}}

                
                <p><strong>Tipo:</strong> 
                    @if ($graduacion->evaluacion->tipo == 2)
                        Examen de grado
                    @else
                        Trabajo dirigido/tesis
                    @endif
                </p>
                <p><strong>Fecha inicio:</strong> {{ $graduacion->evaluacion->finicio }}</p>
                <p><strong>Fecha defensa:</strong> {{ $graduacion->evaluacion->fdefensa }}</p>
                <p><strong>Egresado:</strong> {{ Auth::user()->userDataUagrm($graduacion->egresado->registro)['datos']['nombre'] }}</p>
                
                    
                @if ($graduacion->tipo == 3)
                    <p><strong>Tutor:</strong> {{ $graduacion->tutor->nombre.' '.$graduacion->tutor->apellido.' - '.$graduacion->tutor->registro }}</p>
                @endif
                
    
                @if ($graduacion->tipo == 3)
                   <p><strong>Titulo:</strong> {{ $graduacion->titulo }}</p>
                @endif
                
                @foreach ($graduacion->evaluacion->tribunal as $tribunal)
                    <p><strong>Tribunal: </strong> {{ $tribunal->nombre.' '.$tribunal->apellido.' - '.$tribunal->registro }}</p>
                @endforeach
             </div>
             <div class="card-footer d-flex">
                Visto {{ date('d/m/Y', strtotime($graduacion->evaluacion->updated_at)) }}
             </div>
          </div>
       </div>
    @else
        <h5>Aún no tiene tribunales asignados</h5>
    @endif
</div>

@endsection
@section('script')

@endsection