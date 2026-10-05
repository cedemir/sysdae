<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') Administração</title>
    @livewireStyles

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --topbar-height: 60px;
            --sidebar-bg: #ffffff;
            --sidebar-bg-hover: #e9ecef;
            --sidebar-border: #dee2e6;
            --sidebar-text: #212529;
            --sidebar-heading: #6c757d;
            --sidebar-muted: #495057;
            --sidebar-active: #28a745;
            --page-bg: #f1f5f9;
        }

        body {
            font-size: .9rem;
            background-color: var(--page-bg);
        }

        /*
         * Menu lateral
         */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            width: var(--sidebar-width);
            display: flex;
            flex-direction: column;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            border-right: 1px solid var(--sidebar-border);
            transition: transform .25s ease;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            height: var(--topbar-height);
            padding: 0 1.25rem;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: .05em;
            color: var(--sidebar-text);
            border-bottom: 1px solid var(--sidebar-border);
            flex-shrink: 0;
        }

        .sidebar-brand .bi {
            color: var(--sidebar-active);
            font-size: 1.4rem;
        }

        .sidebar-scroll {
            flex: 1;
            overflow-y: auto;
            padding: .75rem 0;
        }

        .sidebar-nav,
        .sidebar-submenu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sidebar-group-toggle {
            display: flex;
            align-items: center;
            gap: .65rem;
            padding: .65rem 1.25rem;
            color: var(--sidebar-heading);
            font-weight: 600;
            text-transform: uppercase;
            font-size: .75rem;
            letter-spacing: .06em;
        }

        .sidebar-group-toggle:hover {
            color: var(--sidebar-text);
            text-decoration: none;
            background-color: var(--sidebar-bg-hover);
        }

        .sidebar-group-toggle .bi {
            font-size: 1rem;
        }

        .sidebar-caret {
            margin-left: auto;
            font-size: .75rem !important;
            transition: transform .2s ease;
        }

        .sidebar-group-toggle.collapsed .sidebar-caret {
            transform: rotate(-90deg);
        }

        .sidebar-submenu {
            padding-bottom: .4rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: .65rem;
            margin: .1rem .75rem;
            padding: .5rem .85rem .5rem 1.4rem;
            border-radius: .4rem;
            color: var(--sidebar-muted);
        }

        .sidebar-link:hover {
            color: var(--sidebar-text);
            text-decoration: none;
            background-color: var(--sidebar-bg-hover);
        }

        .sidebar-link.active {
            color: #fff;
            background-color: var(--sidebar-active);
        }

        /*
         * Barra superior
         */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 1020;
            display: flex;
            align-items: center;
            height: var(--topbar-height);
            padding: 0 1.5rem;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(15, 23, 42, .08);
        }

        .topbar-title {
            font-size: 1.05rem;
            font-weight: 600;
            margin: 0;
            color: #0f172a;
        }

        .topbar-toggle {
            display: none;
            border: 0;
            background: none;
            font-size: 1.5rem;
            margin-right: .75rem;
            padding: 0;
            color: #0f172a;
        }

        .topbar-user {
            margin-left: auto;
        }

        .topbar-user .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: .5rem;
            color: #0f172a;
        }

        .topbar-user .dropdown-toggle:hover {
            text-decoration: none;
        }

        .avatar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: var(--sidebar-active);
            color: #fff;
            font-weight: 600;
        }

        .topbar-user .dropdown-item .bi {
            margin-right: .5rem;
        }

        /*
         * Conteúdo
         */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .main-content {
            padding: 0 1.5rem 2rem;
        }

        .sidebar-backdrop {
            display: none;
        }

        /*
         * Telas pequenas: menu lateral vira gaveta
         */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .topbar-toggle {
                display: inline-block;
            }

            .sidebar-open .sidebar {
                transform: translateX(0);
            }

            .sidebar-open .sidebar-backdrop {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 1030;
                background-color: rgba(15, 23, 42, .5);
            }
        }
    </style>
</head>
<body>

@include('layouts.partials.sidebar')
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<div class="main-wrapper">
    <header class="topbar">
        <button class="topbar-toggle" type="button" id="sidebarToggle" aria-label="Abrir menu">
            <i class="bi bi-list"></i>
        </button>

        <h1 class="topbar-title">@yield('title')</h1>

        @auth
        <div class="dropdown topbar-user">
            <a href="#" class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar">{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</span>
                <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="userMenu">
                <h6 class="dropdown-header">{{ Auth::user()->email }}</h6>
                <a class="dropdown-item" href="{{ route('admin.senha.edit') }}"><i class="bi bi-key"></i>Alterar senha</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Sair</button>
                </form>
            </div>
        </div>
        @endauth
    </header>

    <main role="main" class="main-content">

        @yield('content')

    </main>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script>
    (function () {
        var body = document.body;
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            body.classList.toggle('sidebar-open');
        });
        document.getElementById('sidebarBackdrop').addEventListener('click', function () {
            body.classList.remove('sidebar-open');
        });
    })();
</script>
@yield('scripts')
@livewireScripts
</body>
</html>
