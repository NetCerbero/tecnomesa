<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        .jumbotron {
            background: darkgreen;
            color: white;
            padding-bottom: 80px;
        }

        .jumbotron .btn-primary {
            background: #845ac7;
            border-color: #845ac7;
        }

        .jumbotron .btn-primary:hover {
            background: #7646c1;
        }

        .jumbotron p {
            color: lightgreen;
            max-width: 75%;
            margin: 1em auto 2em;
        }

        .navbar + .jumbotron {
            margin-top: -20px;
        }

        .jumbotron .lang-logo {
            display: block;
            /*background: #343A40;*/
            border-radius: 50%;
            overflow: hidden;
            width: 250px;
            height: 250px;
            margin: auto;
            /*border: 2px solid white;*/
        }

        .jumbotron .lang-logo img {
            max-width: 100%;
        }

        body {
            background-color: beige
        }
    </style>

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"/>
    <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <!-- /bootstrap -->

    <!-- open iconic -->
    <link href="{{asset('css/open-iconic-bootstrap.css')}}" rel="stylesheet">

</head>
<body>

<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
        <span class="oi oi-book"></span> Gestión Egresados - Administración de Empresas
    </a>
    <!-- <a class="btn btn-secondary float-right" href="/login">Iniciar Sesión</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- ##################### gestion de usuarios ##################### -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="opcionesDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Opciones
                </a>
                <div class="dropdown-menu" aria-labelledby="opcionesDropdown">
                    <a class="dropdown-item" href="#">Opcion1</a>
                    <a class="dropdown-item" href="#">Opcion2</a>
                    <a class="dropdown-item" href="#">Opcion3</a>
                    <!-- <div class="dropdown-divider"></div> -->
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="sesionDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   <span class="oi oi-person"></span> Cuenta de Usuario
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sesionDropdown">

                    <form action="/logout" method="post">
                        <input type="submit" class="dropdown-item" value="Cerrar sesión">
                    </form>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav> <!-- /nav bar -->

<!-- jumbotron, para más placer :v -->
<div class="jumbotron text-center"
     style="background-image: url({{asset('/img/jumbotron-bg.jpg')}});
             background-repeat: no-repeat;
             background-size: cover;
             background-position: center"
>
    <div class="container">
        <a href="/" class="lang-logo">
            <img src="{{asset('img/hero-sm.png')}}">
        </a>

        <h1>Sistema de Gestión de Egresados - ADM</h1>
    </div>
</div> <!-- /jumbotron -->

<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><span class="oi oi-question-mark" style="color: #343A40"></span>
                        Acerca del Sistema de Gestión de Egresados
                    </h5>
                    <hr>
                    <p style="text-align: justify;">

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gerendus est mos, modo recte sentiat. Ex
                        ea
                        difficultate illae fallaciloquae, ut ait Accius, malitiae natae sunt. Cur igitur easdem res,
                        inquam,
                        Peripateticis dicentibus verbum nullum est, quod non intellegatur? Summus dolor plures dies
                        manere non
                        potest?</p>

                    <p>Duo Reges: constructio interrete.
                        <mark>Primum in nostrane potestate est, quid meminerimus?</mark>
                        <b>Quamquam id quidem, infinitum est in hac urbe;</b>Immo alio genere;
                        <mark>Cur id non ita fit?</mark>
                        Isto modo ne improbos quidem,
                        si essent boni viri. Collatio igitur ista te nihil iuvat. Hoc dixerit potius Ennius: Nimium boni
                        est,
                        cui nihil est mali. Ac tamen hic mallet non dolere. Haeret in salebra.
                    </p>

                    <p>Si quicquam extra virtutem habeatur in bonis. Ut scias me intellegere, primum idem esse dico
                        voluptatem, quod ille don. Facit enim ille duo seiuncta ultima bonorum, quae ut essent vera,
                        coniungi
                        debuerunt; Sed erat aequius Triarium aliquid de dissensione nostra iudicare. </p>
                    </p>
                </div>
            </div>
        </div>

    </div><!-- row -->

    <hr>

    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><span class="oi oi-info" style="color: #343A40"></span> Misión
                    </h5>
                    <hr>
                    <ol>
                        <li>Nam et complectitur verbis, quod vult, et dicit plane, quod intellegam;</li>
                        <li>Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet.</li>
                        <li>Quodcumque in mentem incideret, et quodcumque tamquam occurreret.</li>
                        <li>Itaque vides, quo modo loquantur, nova verba fingunt, deserunt usitata.</li>
                        <li>Expressa vero in iis aetatibus, quae iam confirmatae sunt.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><span class="oi oi-info" style="color: #343A40"></span> Visión</h5>
                    <hr>
                    <dl>
                        <dt><dfn>Quod equidem non reprehendo;</dfn></dt>
                        <dd>Theophrasti igitur, inquit, tibi liber ille placet de beata vita?</dd>
                        <dt><dfn>Beatum, inquit.</dfn></dt>
                        <dd>Erit enim mecum, si tecum erit.</dd>
                        <dt><dfn>Immo alio genere;</dfn></dt>
                        <dd>Res tota, Torquate, non doctorum hominum, velle post mortem epulis celebrari memoriam sui
                            nominis.
                        </dd>
                        <dt><dfn>Explanetur igitur.</dfn></dt>
                        <dd>Quod ea non occurrentia fingunt, vincunt Aristonem;</dd>
                    </dl>
                </div>
            </div>
        </div>

    </div> <!-- row -->

</div> <!-- container -->

<div> <!-- footer -->
    <br>

    <p style="text-align: center; background-color: #1e2c35; color: white; margin: 0rem; padding: 1rem">
        &copy 2019 - PixelWare
    </p>
</div> <!-- /footer -->
</body>
</html>