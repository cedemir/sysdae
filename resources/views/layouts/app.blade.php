<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>@yield('title') Administração</title>

    <link rel="canonical" href="http://127.0.0.1:8000">

    <!-- Bootstrap core CSS -->
    <!--
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    -->

    <link href="{{asset('css/app.css')}}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <style>
        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
         * Sidebar
         */

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 48px 0 0; /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        @supports ((position: -webkit-sticky) or (position: sticky)) {
            .sidebar-sticky {
                position: -webkit-sticky;
                position: sticky;
            }
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #999;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*
         * Navbar
         */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

    </style>
    <!-- Custom styles for this template -->

</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Administrar</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#" onclick="
            document.getElementById('logout').submit()">Sair</a>
            <form action="{{route('logout')}}" method="POST" id="logout">
                @csrf
            </form>
       
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.alunos.index')}}>
                            <span data-feather="file"></span>
                            Alunos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.alojamentos.index')}}>
                            <span data-feather="file"></span>
                            Alojamentos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.apartamentos.index')}}>
                            <span data-feather="file"></span>
                            Apartamentos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.atendimentos.index')}}>
                            <span data-feather="file"></span>
                            Atendimentos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.cursos.index')}}>
                            <span data-feather="file"></span>
                           Cursos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.forma_atendimentos.index')}}>
                            <span data-feather="file"></span>
                            Formas de Atendimento
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.matriculas.index')}}>
                            <span data-feather="file"></span>
                            Matriculas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.medidas_disciplinares.index')}}>
                            <span data-feather="file"></span>
                            Medidas Disciplinares
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.ocorrencias.index')}}>
                            <span data-feather="file"></span>
                            Ocorrências
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.ocorrencias_atividades_orientadas.index')}}>
                            <span data-feather="file"></span>
                           Atividades Orientadas
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.programa_beneficios.index')}}>
                            <span data-feather="file"></span>
                           Programa de Benefício
                        </a>
               
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.regime_residencias.index')}}>
                            <span data-feather="file"></span>
                           Regime da Residência
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.residencias.index')}}>
                            <span data-feather="file"></span>
                           Residência Estudantil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.residencia_autorizacoes.index')}}>
                            <span data-feather="file"></span>
                           Autorizações de Saída da Residência Estudantil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.residencia_faltas.index')}}>
                            <span data-feather="file"></span>
                        Faltas na Residência Estudantil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.series.index')}}>
                            <span data-feather="file"></span>
                        Séries
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href={{route('admin.setores.index')}}>
                            <span data-feather="file"></span>
                        Setores
                        </a>
                    </li>




                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            @yield('content')

        </main>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script> 
@yield('scripts')
</body>
</html>
