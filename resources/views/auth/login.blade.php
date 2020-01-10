
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themicon.co/theme/angle/v4.6/static-html/app/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 18:27:57 GMT -->
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <title>Angle - Bootstrap Admin Template</title><!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/brands.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/regular.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/solid.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/fontawesome.css') }}"><!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}"><!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-4 wd-xl">
         <!-- START card-->
         <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" src="img/logo.png" alt="Image"></a></div>
            <div class="card-body">
               <p class="text-center py-2">Sistema de egresados - Facultad de Ciencias Economicas</p>
               <form action="{{ route('login') }}" method="POST" class="mb-3" id="loginForm" novalidate>
                    @csrf
                  <div class="form-group">
                     <div class="input-group with-focus">
                         <input name="email" class="form-control border-right-0" id="exampleInputEmail1" type="email" placeholder="Enter email" autocomplete="off" required>
                        <div class="input-group-append">
                            <span class="input-group-text text-muted bg-transparent border-left-0">
                                <em class="fa fa-envelope"></em>
                            </span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group with-focus">
                        <input name="password" class="form-control border-right-0" id="exampleInputPassword1" type="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <span class="input-group-text text-muted bg-transparent border-left-0">
                                <em class="fa fa-lock"></em>
                            </span>
                        </div>
                     </div>
                  </div>
                  </div><button class="btn btn-block btn-primary mt-3" type="submit">Login</button>
               </form>
            </div>
         </div><!-- END card-->
         <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2019</span><span class="mr-2">-</span><span>Angle</span><br><span>Bootstrap Admin Template</span></div>
      </div>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="{{ asset('vendor/modernizr/modernizr.custom.js') }}"></script><!-- STORAGE API-->
   <script src="{{ asset('vendor/js-storage/js.storage.js') }}"></script><!-- i18next-->
   <script src="{{ asset('vendor/i18next/i18next.js') }}"></script>
   <script src="{{ asset('vendor/i18next-xhr-backend/i18nextXHRBackend.js') }}"></script><!-- JQUERY-->
   <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script><!-- BOOTSTRAP-->
   <script src="{{ asset('vendor/popper.js/dist/umd/popper.js') }}"></script>
   <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script><!-- PARSLEY-->
   <script src="{{ asset('vendor/parsleyjs/dist/parsley.js') }}"></script><!-- =============== APP SCRIPTS ===============-->
   <script src="{{ asset('js/app.js') }}"></script>
</body>


<!-- Mirrored from themicon.co/theme/angle/v4.6/static-html/app/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 18:27:57 GMT -->
</html>