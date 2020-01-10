
@extends('template')
@section('style')
<!-- Datatables-->
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css') }}"><!-- =============== BOOTSTRAP STYLES ===============-->
@endsection
@section('title')
<h3>Avance de proyecto</h3>
@endsection
@section('content')
<div class="card">
                  <div class="card-header">
                    <div class="card-title">
                        <div class="d-flex bd-highlight mb-3">
                          <div class="p-2 bd-highlight">Gestión de egresados</div>
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
                              <th>Tribunal</th>
                              <th>Estudiante</th>
                              <th>Titulo</th>
                              <th>Evaluación Escrita</th>
                              <th>Evaluación oral</th>
                              <th>Observación</th>
                              <th>Nota final</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($rsp as $eva)
                                <tr class="gradeX">
                                  <td>
                                    @foreach ($eva['tribunal'] as $value)
                                      {{ $value }} <br>
                                    @endforeach
                                  </td>
                                  
                                  <td>{{ $eva['egresado'] }}</td>

                                  <td>{{ $eva['titulo'] }}</td>

                                  <td>
                                    @foreach ($eva['evaluacion'] as $value)
                                      {{ $value }}<br>
                                    @endforeach
                                  </td>

                                  <td>
                                    @foreach ($eva['oral'] as $value)
                                      {{ $value }}<br>
                                    @endforeach
                                  </td>

                                  <td>
                                    @foreach ($eva['observacion'] as $value)
                                      {{ $value }}<br>
                                    @endforeach
                                  </td>
                                  
                                  <td>{{ $eva['final'] }}</td>
                                  
                                  <td>
                                    <a class="badge badge-warning" href="{{ route('evaluacion_nota',$eva['id']) }}">Ingresar nota</a>
                                  </td>
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