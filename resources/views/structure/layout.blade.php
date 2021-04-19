<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SquadMS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/app.css', 'themes/squadms-default-theme') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body class="antialiased">
        <x-squadms-default-theme::navigation.navbar :brand="config('app.name', 'SquadMS')">
            <x-slot name="navRight">
                <x-squadms-default-theme::navigation.item :active="\Route::currentRouteNamed('home')" :link="route('home')" title="Home"/>

                @auth
                    <x-squadms-default-theme::navigation.item :active="\Route::currentRouteNamed('profile') && \Request::route('steam_id_64') === \Auth::user()->steam_id_64" :link="route('profile', ['steam_id_64' => \Auth::user()->steam_id_64])" title="Profil"/>
                @endauth

                @guest
                    <x-squadms-default-theme::navigation.item :link="route(config('sqms.auth.routes.login'))" title="Login"/>
                @endguest
            </x-slot>
        </x-squadms-default-theme::navigation.navbar>

        @yield('content')

        <!-- Styles -->
        <script src="{{ mix('js/app.js', 'themes/squadms-default-theme') }}"></script>
        @stack('scripts')
    </body>
</html>
