<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SquadMS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/admin/app.css', 'themes/squadms-default-theme') }}" rel="stylesheet">
        @stack('styles')
    </head>

    <body class="min-vh-100 d-flex flex-column">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route(config('sqms.routes.def.admin-dashboard.name')) }}">{{ config('app.name', 'SquadMS') }}</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <x-squadms-default-theme::navigation.item :link="route(config('sqms.routes.def.admin-dashboard.name'))" title="Login">
                                <x-slot name="title">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </x-slot>
                            </x-squadms-default-theme::navigation.item>
                        </ul>
                    </div>
                </nav>

                <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" role="main">
                        @yield('content')
                    </main>

                    @include('squadms-default-theme::admin.structure.footer')
                </div>
                
            </div>
        </div>    

        <!-- Styles -->
        <script src="{{ mix('js/admin/app.js', 'themes/squadms-default-theme') }}"></script>
        @stack('scripts')
    </body>
</html>
