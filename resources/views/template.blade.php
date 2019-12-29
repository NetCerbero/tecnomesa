<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themicon.co/theme/angle/v4.6/static-html/app/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 18:23:21 GMT -->
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <title>Angle - Bootstrap Admin Template</title><!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{asset('vendor/%40fortawesome/fontawesome-free/css/brands.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/%40fortawesome/fontawesome-free/css/regular.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/%40fortawesome/fontawesome-free/css/solid.css')}}">
   <link rel="stylesheet" href="{{asset('vendor/%40fortawesome/fontawesome-free/css/fontawesome.css')}}"><!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{asset('vendor/simple-line-icons/css/simple-line-icons.css')}}"><!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"><!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="{{asset('vendor/whirl/dist/whirl.css')}}"><!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="{{asset('vendor/weather-icons/css/weather-icons.css')}}"><!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="{{asset('css/app.css')}}" id="maincss">
   @yield('style')
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header"><a class="navbar-brand" href="#/">
                  <div class="brand-logo"><img class="img-fluid" src="{{asset('img/logo.png')}}" alt="App Logo"></div>
                  <div class="brand-logo-collapsed"><img class="img-fluid" src="{{asset('img/logo-single.png')}}" alt="App Logo"></div>
               </a></div><!-- END navbar header-->
            <!-- START Left navbar-->
            <ul class="navbar-nav mr-auto flex-row">
               <li class="nav-item">
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops--><a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a><!-- Button to show/hide the sidebar on mobile. Visible on mobile only.--><a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a></li><!-- START User avatar toggle-->
               <li class="nav-item d-none d-md-block">
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops--><a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse"><em class="icon-user"></em></a></li><!-- END User avatar toggle-->
               <!-- START lock screen-->
               <li class="nav-item d-none d-md-block"><a class="nav-link" href="lock.html" title="Lock screen"><em class="icon-lock"></em></a></li><!-- END lock screen-->
            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="navbar-nav flex-row">
               <!-- Search icon-->
               <li class="nav-item"><a class="nav-link" href="#" data-search-open=""><em class="icon-magnifier"></em></a></li><!-- Fullscreen (only desktops)-->
               <li class="nav-item d-none d-md-block"><a class="nav-link" href="#" data-toggle-fullscreen=""><em class="fas fa-expand"></em></a></li><!-- START Alert menu-->
               <li class="nav-item dropdown dropdown-list">
                  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">
                     <em class="fa fa-user"></em>
                  </a><!-- START Dropdown menu-->
                  <div class="dropdown-menu dropdown-menu-right animated flipInX">
                     <div class="dropdown-item">
                        <!-- START list group-->
                        <div class="list-group">
                           <!-- list item-->
                           <div class="list-group-item list-group-item-action">
                              <div class="media">
                                 <div class="align-self-start mr-2"><em class="fa fa-user fa-2x text-info"></em></div>
                                 <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="media-body">
                                       <p class="m-0">Cerrar sesión</p>
                                       <p class="m-0 text-muted text-sm">{{Auth::user()->nombre}}</p>
                                    </div>
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                 </form>
                              </div>
                           </div><!-- list item-->
                        </div><!-- END list group-->
                     </div>
                  </div><!-- END Dropdown menu-->
               </li><!-- END Alert menu-->
               <!-- START Offsidebar button-->
            </ul><!-- END Right Navbar-->
            <!-- START Search form-->
            <form class="navbar-form" role="search" action="http://themicon.co/theme/angle/v4.6/static-html/app/search.html">
               <div class="form-group"><input class="form-control" type="text" placeholder="Type and hit enter ...">
                  <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
               </div><button class="d-none" type="submit">Submit</button>
            </form><!-- END Search form-->
         </nav><!-- END Top Navbar-->
      </header><!-- sidebar-->
      <aside class="aside-container">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav class="sidebar" data-sidebar-anyclick-close="">
               <!-- START sidebar nav-->
               <ul class="sidebar-nav">
                  <!-- START user info-->
                  <li class="has-user-block">
                     <div class="collapse" id="user-block">
                        <div class="item user-block">
                           <!-- User picture-->
                           <div class="user-block-picture">
                              <div class="user-block-status"><img class="img-thumbnail rounded-circle" src="img/user/02.jpg" alt="Avatar" width="60" height="60">
                                 <div class="circle bg-success circle-lg"></div>
                              </div>
                           </div><!-- Name and Job-->
                           <div class="user-block-info"><span class="user-block-name">Hello, Mike</span><span class="user-block-role">Designer</span></div>
                        </div>
                     </div>
                  </li><!-- END user info-->
                  <!-- Iterates over all sidebar items-->
                  <li class="nav-heading "><span data-localize="sidebar.heading.HEADER">Main Navigation</span></li>
                  <!--@php
                     $Cus = App\Cu::all();
                  @endphp
              
                   @foreach($Cus as $cu)
                     <li class=" ">
                        <a href="#dashboard{{$cu->id}}" title="Dashboard" data-toggle="collapse">
                           <em class="icon-speedometer"></em>
                           <span data-localize="sidebar.nav.DASHBOARD">{{$cu->nombre_cu}}</span>
                        </a>
                        <ul class="sidebar-nav sidebar-subnav collapse" id="dashboard{{$cu->id}}">
                           <li class=""><a href="{{url('/'.$cu->ruta)}}" title="Dashboard v1"><span>Listar</span></a></li>
                           <li class=""><a href="{{url('/'.$cu->ruta.'/create')}}" title="Dashboard v1"><span>Registrar</span></a></li>
                           <li class=""><a href="{{url('/'.$cu->ruta.'/create/estudiante')}}" title="Dashboard v1"><span>Registrar estudiante</span></a></li>
                           <li class=""><a href="{{url('/'.$cu->ruta.'/create/docente')}}" title="Dashboard v1"><span>Registrar docente</span></a></li>
                           <li class=""><a href="{{url('/'.$cu->ruta.'/create/externo')}}" title="Dashboard v1"><span>Registrar externo</span></a></li>
                        </ul>
                     </li>
                  @endforeach -->
                  @php
                     $gUser = Auth::user()->hasRole(2);
                  @endphp
                  @if($gUser['total']>0)
                     <li class=" ">
                        <a href="#dashboard1" title="Dashboard" data-toggle="collapse">
                           <em class="icon-speedometer"></em>
                           <span data-localize="sidebar.nav.DASHBOARD">Gestión de usuario</span>
                        </a>
                        <ul class="sidebar-nav sidebar-subnav collapse" id="dashboard1">
                           @if($gUser['leer'])
                              <li class=""><a href="{{url('/user')}}" title="Dashboard v1"><span>Listar</span></a></li>
                           @endif
                           @if($gUser['escribir'])
                              <li class=""><a href="{{url('/user/create/estudiante')}}" title="Dashboard v1"><span>Registrar estudiante</span></a></li>
                              <li class=""><a href="{{url('/user/create/docente')}}" title="Dashboard v1"><span>Registrar docente</span></a></li>
                              <li class=""><a href="{{url('/user/create/externo')}}" title="Dashboard v1"><span>Registrar externo</span></a></li>
                           @endif
                        </ul>
                     </li>
                  @endif

                  <li class=" ">
                     <a href="#dashboard2" title="Dashboard" data-toggle="collapse">
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Adm Privilegios</span>
                     </a>
                     <ul class="sidebar-nav sidebar-subnav collapse" id="dashboard2">
                        <li class=""><a href="{{url('/adm')}}" title="Dashboard v1"><span>Listar</span></a></li>
                        <li class=""><a href="{{url('/adm/create')}}" title="Dashboard v1"><span>Registrar</span></a></li>
                     </ul>
                  </li>
               </ul><!-- END sidebar nav-->
            </nav>
         </div><!-- END Sidebar (left)-->
      </aside><!-- offsidebar-->
      <aside class="offsidebar d-none">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab"><em class="icon-equalizer fa-lg"></em></a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab"><em class="icon-user fa-lg"></em></a></li>
               </ul><!-- Tab panes-->
               <div class="tab-content">
                  <div class="tab-pane fade active show" id="app-settings" role="tabpanel">
                     <h3 class="text-center text-thin mt-4">Settings</h3>
                     <div class="p-2">
                        <h4 class="text-muted text-thin">Themes</h4>
                        <div class="row row-flush mb-2">
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-a.css"><input type="radio" name="setting-theme" checked="checked"><span class="icon-check"></span><span class="split"><span class="color bg-info"></span><span class="color bg-info-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-b.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-green"></span><span class="color bg-green-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-c.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-purple"></span><span class="color bg-purple-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-d.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-danger"></span><span class="color bg-danger-light"></span></span><span class="color bg-white"></span></label></div>
                           </div>
                        </div>
                        <div class="row row-flush mb-2">
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-e.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-info-dark"></span><span class="color bg-info"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-f.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-green-dark"></span><span class="color bg-green"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-g.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-purple-dark"></span><span class="color bg-purple"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                           <div class="col mb-2">
                              <div class="setting-color"><label data-load-css="css/theme-h.css"><input type="radio" name="setting-theme"><span class="icon-check"></span><span class="split"><span class="color bg-danger-dark"></span><span class="color bg-danger"></span></span><span class="color bg-gray-dark"></span></label></div>
                           </div>
                        </div>
                     </div>
                     <div class="p-2">
                        <h4 class="text-muted text-thin">Layout</h4>
                        <div class="clearfix">
                           <p class="float-left">Fixed</p>
                           <div class="float-right"><label class="switch"><input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Boxed</p>
                           <div class="float-right"><label class="switch"><input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">RTL</p>
                           <div class="float-right"><label class="switch"><input id="chk-rtl" type="checkbox"><span></span></label></div>
                        </div>
                     </div>
                     <div class="p-2">
                        <h4 class="text-muted text-thin">Aside</h4>
                        <div class="clearfix">
                           <p class="float-left">Collapsed</p>
                           <div class="float-right"><label class="switch"><input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Collapsed Text</p>
                           <div class="float-right"><label class="switch"><input id="chk-collapsed-text" type="checkbox" data-toggle-state="aside-collapsed-text"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Float</p>
                           <div class="float-right"><label class="switch"><input id="chk-float" type="checkbox" data-toggle-state="aside-float"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Hover</p>
                           <div class="float-right"><label class="switch"><input id="chk-hover" type="checkbox" data-toggle-state="aside-hover"><span></span></label></div>
                        </div>
                        <div class="clearfix">
                           <p class="float-left">Show Scrollbar</p>
                           <div class="float-right"><label class="switch"><input id="chk-scroll" type="checkbox" data-toggle-state="show-scrollbar" data-target=".sidebar"><span></span></label></div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="app-chat" role="tabpanel">
                     <h3 class="text-center text-thin mt-4">Connections</h3>
                     <div class="list-group">
                        <!-- START list title-->
                        <div class="list-group-item border-0"><small class="text-muted">ONLINE</small></div><!-- END list title-->
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/05.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Juan Sims</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-success circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/06.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Maureen Jenkins</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-success circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/07.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Billie Dunn</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-danger circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/08.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Tomothy Roberts</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-warning circle-lg"></span></div>
                           </div>
                        </div><!-- START list title-->
                        <div class="list-group-item border-0"><small class="text-muted">OFFLINE</small></div><!-- END list title-->
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/09.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Lawrence Robinson</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-warning circle-lg"></span></div>
                           </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0">
                           <div class="media"><img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/10.jpg" alt="Image">
                              <div class="media-body text-truncate"><a href="#"><strong>Tyrone Owens</strong></a><br><small class="text-muted">Designeer</small></div>
                              <div class="ml-auto"><span class="circle bg-warning circle-lg"></span></div>
                           </div>
                        </div>
                     </div>
                     <div class="px-3 py-4 text-center">
                        <!-- Optional link to list more users--><a class="btn btn-purple btn-sm" href="#" title="See more contacts"><strong>Load more..</strong></a></div><!-- Extra items-->
                     <div class="px-3 py-2">
                        <p><small class="text-muted">Tasks completion</small></p>
                        <div class="progress progress-xs m-0">
                           <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"><span class="sr-only">80% Complete</span></div>
                        </div>
                     </div>
                     <div class="px-3 py-2">
                        <p><small class="text-muted">Upload quota</small></p>
                        <div class="progress progress-xs m-0">
                           <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"><span class="sr-only">40% Complete</span></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav><!-- END Off Sidebar (right)-->
      </aside><!-- Main section-->
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               <div>@yield('title')<small data-localize="dashboard.WELCOME"></small></div><!-- START Language list-->
               <div class="ml-auto">
                  <div class="btn-group"><button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button" data-toggle="dropdown">English</button>
                     <div class="dropdown-menu dropdown-menu-right-forced animated fadeInUpShort" role="menu">
                        <a class="dropdown-item" href="#" data-set-lang="en">English</a>
                        <a class="dropdown-item" href="#" data-set-lang="es">Spanish</a></div>
                  </div>
               </div><!-- END Language list-->
            </div><!-- START cards box-->
            @yield('content')
         </div>
      </section><!-- Page footer-->
      <footer class="footer-container"><span>&copy; 2019 - Angle</span></footer>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="{{asset('vendor/modernizr/modernizr.custom.js')}}"></script><!-- STORAGE API-->
   <script src="{{asset('vendor/js-storage/js.storage.js')}}"></script><!-- SCREENFULL-->
   <script src="{{asset('vendor/screenfull/dist/screenfull.js')}}"></script><!-- i18next-->
   <script src="{{asset('vendor/i18next/i18next.js')}}"></script>
   <script src="{{asset('vendor/i18next-xhr-backend/i18nextXHRBackend.js')}}"></script>
   <script src="{{asset('vendor/jquery/dist/jquery.js')}}"></script>
   <script src="{{asset('vendor/popper.js/dist/umd/popper.js')}}"></script>
   <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.js')}}"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- SLIMSCROLL-->
   <script src="{{asset('vendor/jquery-slimscroll/jquery.slimscroll.js')}}"></script><!-- SPARKLINE-->
   <script src="{{asset('vendor/jquery-sparkline/jquery.sparkline.js')}}"></script><!-- FLOT CHART-->
   <script src="{{asset('vendor/flot/jquery.flot.js')}}"></script>
   <script src="{{asset('vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js')}}"></script>
   <script src="{{asset('vendor/flot/jquery.flot.resize.js')}}"></script>
   <script src="{{asset('vendor/flot/jquery.flot.pie.js')}}"></script>
   <script src="{{asset('vendor/flot/jquery.flot.time.js')}}"></script>
   <script src="{{asset('vendor/flot/jquery.flot.categories.js')}}"></script>
   <script src="{{asset('vendor/jquery.flot.spline/jquery.flot.spline.js')}}"></script><!-- EASY PIE CHART-->
   <script src="{{asset('vendor/easy-pie-chart/dist/jquery.easypiechart.js')}}"></script><!-- MOMENT JS-->
   <script src="{{asset('vendor/moment/min/moment-with-locales.js')}}"></script><!-- =============== APP SCRIPTS ===============-->
   <script src="{{asset('js/app.js')}}"></script>
   @yield('script')
</body>


<!-- Mirrored from themicon.co/theme/angle/v4.6/static-html/app/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 18:24:21 GMT -->
</html>