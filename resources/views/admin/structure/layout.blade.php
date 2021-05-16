<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SquadMS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        <link href="{{ mix('css/admin/app.css', 'themes/squadms-default-theme') }}" rel="stylesheet">
        @stack('styles')

        <!-- Important Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    </head>

    <body class="min-vh-100 d-flex flex-column bg-light">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route(config('sqms.routes.def.admin-dashboard.name')) }}">
                <img src="https://squadms.com/img/logo-white.svg" alt="SquadMS Logo" class="img-fluid" style="height: 1.75em;">
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav me-auto px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route(config('sqms.routes.def.home.name')) }}">Back to Website</a>
                </li>
            </ul>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            {!! \SquadMSMenu::getMenu('admin')->setWrapperTag()->render() !!}
                        </ul>
                    </div>
                </nav>

                <div class="col-md-9 col-lg-10 ms-sm-auto px-0">
                    <main class="px-md-4 py-4 bg-white" role="main">
                        @yield('content')
                    </main>

                    @include('squadms-default-theme::admin.structure.footer')
                </div>
                
            </div>
        </div>    

        <!-- Scripts -->
        @livewireScripts
        <script src="{{ mix('js/admin/app.js', 'themes/squadms-default-theme') }}"></script>
        @stack('scripts')
    </body>
</html>
