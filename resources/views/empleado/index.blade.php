
@extends('template')
@section('style')
<!-- Datatables-->
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css') }}"><!-- =============== BOOTSTRAP STYLES ===============-->
@endsection
@section('title')
<h3>Titulados</h3>
@endsection
@section('content')
<div class="d-flex justify-content-end my-2">
	<a class="btn btn-primary" href="{{ route('inflaboral.create') }}">Registrar</a>
</div>
<div class="card">
                  <div class="card-header">
                    <div class="card-title">
                        <div class="d-flex bd-highlight mb-3">
                          <div class="p-2 bd-highlight">Vinculacion laboral</div>
                         {{--  <div class="p-2 bd-highlight ml-auto">
                            <a href="{{ route('empresa.create') }}" class="ml-auto btn btn-primary">Registrar</a>
                          </div> --}}
                        </div>
                    </div>
                     {{-- <div class="text-sm">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: $().DataTable();.</div> --}}
                  </div>
                  <div class="card-body">
                     <table class="table table-striped my-4 w-100" id="datatable1">
                        <thead>
                           <tr>
                              <th>Titulado</th>
                              <th>Empresa</th>
                              <th>Area</th>
                              <th>Puesto</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
	                            @php
          					         		$datos = Auth::user()->userDataUagrm($empleado->titulado->egresado->registro);
          					         	@endphp
                                <tr class="gradeX">
                                  <td>{{ $datos['datos']['nombre'] }}</td>
                                  <td>{{ $empleado->empresa->nombre }}</td>
                                  <td>{{ $empleado->area->area }}</td>
                                  <td>{{ $empleado->nivelPuesto->nivel }}</td>
                                  {{-- <td><a class="badge badge-warning" href="{{route('egresado.edit',$graduacion->id)}}"> editar </a></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
@endsection
@section('script')
<!-- Datatables-->
   <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.colVis.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.flash.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-keytable/js/dataTables.keyTable.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.js') }}"></script>
   <script src="{{ asset('vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
   <script src="{{ asset('vendor/jszip/dist/jszip.js') }}"></script>
   <script src="{{ asset('vendor/pdfmake/build/pdfmake.js') }}"></script>
   <script src="{{ asset('vendor/pdfmake/build/vfs_fonts.js') }}"></script><!-- =============== APP SCRIPTS ===============-->
@endsection
