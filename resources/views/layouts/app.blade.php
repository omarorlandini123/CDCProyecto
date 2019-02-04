<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 </head>

<body class="mdc-typography" style="margin:0px;">
    <header class="mdc-top-app-bar" style="height:56px;">
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                @auth
                <a href="#" class="material-icons mdc-top-app-bar__navigation-icon menu-drawer">menu</a>
                @endauth
                <img height="30" width="30" style="margin-left:20px;background-color: #ffffffba;border-radius: 25px;padding: 1px;"
                    src="img/logo.png" alt="Text label">
                <span class="mdc-top-app-bar__title">{{ config('app.name', 'Laravel') }}</span>
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
                @auth
                {{-- <a href="#" class="material-icons mdc-top-app-bar__action-item app-bar-more-items" aria-label="Bookmark this page"
                    alt="Bookmark this page">more_vert</a> --}}
                @endauth
                <div id="toolbar" class="toolbar mdc-menu-surface--anchor">
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                            @auth

                            <li class="mdc-list-item" role="menuitem" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="mdc-list-item__text">Salir</span>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endauth
                        </ul>
                    </div>
                </div>

            </section>

        </div>

    </header>



    <aside class="mdc-drawer mdc-drawer--modal">
        <div class="mdc-drawer__header">
            @guest
            <li class="nav-item">
                <a class="nav-link" style="color:white;" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
            </li>
            {{-- @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </li>
            @endif --}}
            @else
            <h3 class="mdc-drawer__title">{{ Auth::user()->name }}</h3>
            <h6 class="mdc-drawer__subtitle">{{ Auth::user()->email }}</h6>

            @endguest

        </div>

        <div class="mdc-drawer__content">
            <nav class="mdc-list">
                @auth
                <a class="mdc-list-item mdc-list-item--activated" href="/citas" aria-selected="true">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">schedule</i>
                    <span class="mdc-list-item__text">Citas</span>
                </a>
                <a class="mdc-list-item " href="/historias" >
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">assignment_ind</i>
                    <span class="mdc-list-item__text">Historias Clínicas</span>
                </a>
                <br><br>
                <hr class="mdc-list-divider">
                <a class="mdc-list-item mdc-list-item--activated" href="{{ route('logout') }}" aria-selected="true"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">exit_to_app</i>
                    <span class="mdc-list-item__text">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endauth

            </nav>
        </div>
    </aside>
    <div class="mdc-drawer-scrim"></div>
    <div style="height: 0px;">Main Content</div>
    <div class="mdc-drawer-app-content "></div>
    <main class="main-content" id="main-content" style="margin: 0px; " >
            
            @yield('content')
        
    </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/funciones.js') }}" defer></script>
</body>

</html>