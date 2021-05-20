<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
        integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estudiantes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profesores.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tarjetas.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,700%7CZilla+Slab:300,400,500,700,700i%7CGloria+Hallelujah"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> -->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

    </style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a id="textonav" class="navbar-brand" href="{{ url('/') }}"><i id="iconos"
                        class="fas fa-graduation-cap"></i>
                    ACADEMIA CHM
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    {{-- <li><a href="{{ url('/home') }}">Home</a></li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li><a id="textonav" href="{{ url('/login') }}"><i id="iconos"
                                    class="fas fa-sign-in-alt"></i>Iniciar Sesion</a></li>
                        {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                    @else
                        <li><a id="textonav" href="{{ url('/home') }}"><i id="iconos"
                                    class="fas fa-home"></i>Inicio</a></li>
                        <li class="dropdown">
                        <li class="dropdown">
                            <a id="textonav" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i id="iconos" class="fas fa-bars"></i> Modulos <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->usertype_id_usertype == 1)
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('UsuarioController@index') }}"><i id="iconos"
                                                class="fas fa-users"></i>Usuarios</a></li>
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('AsignaturaAdminController@index') }}"><i id="iconos"
                                                class="fas fa-book"></i>Asignaturas</a></li>
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('AsignaturaUsuarioController@index') }}"><i id="iconos"
                                                class="fas fa-edit"></i>Inscribir materia</a></li>
                                @endif
                                @if (Auth::user()->usertype_id_usertype == 2)
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('TareaController@index') }}">Actividades</a></li>
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('RespuestaDController@index') }}">Respuestas</a></li>
                                @endif
                                @if (Auth::user()->usertype_id_usertype == 3)
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('RespuestaEController@index') }}">Actividades</a></li>
                                    <li class="nav-item"><a id="menu" class="nav-link js-scroll-trigger"
                                            href="{{ action('NotaController@index') }}">Notas</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">

                            <a id="textonav" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i id="iconos" class="fas fa-user-tie"></i>

                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a id="menu" href="{{ url('/logout') }}"><i id="iconos"
                                            class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    {{-- <script src="{{ elixir('js/core.min.js') }}"></script> --}}
    {{-- <script src="{{ elixir('js/script.js') }}"></script> --}}
    <footer id="footer">
        <div class="container">
            <div class="row" id="pie">
                <div class="col-md-6" id="footiz">
                    <p id="contactanos">
                    <h1 id="titlepie1">Contacto</h1>
                    Academia CHM
                    <br>
                    Celular: 3102462947
                    <br>
                    academiachm@chm.edu.co - academiachm@gmail.com
                    </p>
                </div>
                <div class="col-md-6" id="footde">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="titlepie2">Redes Sociales</h3>
                        </div>
                    </div>
                    <div class="row" id="prueba2">
                        <div id="col-md-12">
                            <a title="Facebook" href="#"><i id="ic" class="fab fa-facebook-square"></i></a>
                        </div>
                        <div id="col-md-12"><a title="Instagram" href="#"><i id="ic" class="fab fa-instagram"></i></a>
                        </div>
                        <div id="col-md-12"><a title="Telegram" href="#"><i id="ic"
                                    class="fab fa-telegram-plane"></i></a></div>
                    </div>
                </div>
            </div>
            <hr>
        </div>

    </footer>
</body>

</html>
