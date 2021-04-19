<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SquadMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/app.css', 'themes/squadms-default-theme') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        @component(config('sqms.theme') . '::navigation.navbar')
            @slot('navRight')
                @component(config('sqms.theme') . '::navigation.item', ['active' => \Route::currentRouteNamed('home'), 'link' => route('home'), 'title' => 'Home'])
                @endcomponent

                @auth
                    @component(config('sqms.theme') . '::navigation.item', ['active' => \Route::currentRouteNamed('profile') && \Request::route('steam_id_64') === \Auth::user()->steam_id_64, 'link' => route('profile', ['steam_id_64' => \Auth::user()->steam_id_64]), 'title' => 'Profile'])
                    @endcomponent
                @endauth

                @guest
                    @component(config('sqms.theme') . '::navigation.item', ['active' => false, 'link' => route(config('sqms.auth.routes.login')), 'title' => 'Login'])
                    @endcomponent
                @endguest
            @endslot
        @endcomponent

        <!-- Styles -->
        <script src="{{ mix('js/app.js', 'themes/squadms-default-theme') }}"></script>
    </body>
</html>
