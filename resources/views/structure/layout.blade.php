<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SquadMS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/public/app.css', 'themes/squadms-default-theme') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body class="min-vh-100 d-flex flex-column bg-light">
        <x-squadms-default-theme::navigation.navbar :brand="config('app.name', 'SquadMS')">
            <x-slot name="navLeft">
                <x-squadms-default-theme::navigation.item :active="\NavigationHelper::isCurrentRoute(config('sqms.routes.def.home.name'))" :link="route(config('sqms.routes.def.home.name'))" title="Home"/>

                @admin(\Auth::user())
                <x-squadms-default-theme::navigation.item :link="route(config('sqms.routes.def.admin-dashboard.name'))" title="Admin"/>
                @endadmin
            </x-slot>
            <x-slot name="navRight">
                @if (\Auth::user())
                    <x-squadms-default-theme::navigation.item :active="\NavigationHelper::isCurrentRoute(config('sqms.routes.def.profile.name')) && \Request::route('steam_id_64') === \Auth::user()->steam_id_64" :link="route(config('sqms.routes.def.profile.name'), ['steam_id_64' => \Auth::user()->steam_id_64])" title="Profil"/>
                @else
                    <x-squadms-default-theme::navigation.item :link="route(config('sqms.routes.def.steam-login.name'))" title="Login"/>
                @endif

                <x-squadms-default-theme::navigation.dropdown>
                    <x-slot name="title">
                        <span class="flag-icon flag-icon-{{ (string)\Illuminate\Support\Str::of(app()->getLocale())->replace('en', 'us') }}"></span>
                    </x-slot>

                    <x-slot name="links">
                        @foreach (\LocaleHelper::getAvailableLocales(true) as $locale)
                            <x-squadms-default-theme::dropdown.item :link="\Route::localizedUrl($locale)">
                                <x-slot name="title">
                                    <span class="flag-icon flag-icon-{{ (string)\Illuminate\Support\Str::of($locale)->replace('en', 'us') }}"></span> {{ \LocaleHelper::getHumanReadableName($locale) }}
                                </x-slot>
                            </x-squadms-default-theme::dropdown.item>
                        @endforeach
                    </x-slot>
                </x-squadms-default-theme::navigation.dropdown>
            </x-slot>
        </x-squadms-default-theme::navigation.navbar>

        <main class="flex-grow-1 d-flex flex-column bg-white {{ $mainClass ?? '' }}" role="main">
            @yield('content')
        </main>

        @include('squadms-default-theme::structure.footer')

        <!-- Styles -->
        <script src="{{ mix('js/public/app.js', 'themes/squadms-default-theme') }}"></script>
        @stack('scripts')
    </body>
</html>
