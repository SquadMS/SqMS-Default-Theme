<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ \LocaleHelper::isRTL(app()->getLocale()) ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SquadMS') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/public/app' . (LocaleHelper::isRTL(app()->getLocale()) ? '-rtl' : '') . '.css', 'themes/squadms-default-theme') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body class="min-vh-100 d-flex flex-column bg-light">
        <x-squadms-default-theme::navigation.navbar :brand="config('app.name', 'SquadMS')">
            <x-slot name="navLeft">
                {!! \SquadMSMenu::getMenu('main-left')->setWrapperTag()->render() !!}
            </x-slot>
            
            <x-slot name="navRight">
                {!! \SquadMSMenu::getMenu('main-right')->setWrapperTag()->render() !!}

                @if (count(\LocaleHelper::getAvailableLocales()) > 1)
                    <x-squadms-default-theme::navigation.dropdown>
                        <x-slot name="title">
                            <span class="flag-icon {{ \LocaleHelper::localeToFlagIconsCSS(app()->getLocale()) }}"></span>
                        </x-slot>

                        <x-slot name="links">
                            @foreach (\LocaleHelper::getAvailableLocales(true) as $locale)
                                <x-squadms-default-theme::dropdown.item :link="\Route::localizedUrl($locale)">
                                    <x-slot name="title">
                                        <span class="flag-icon {{ \LocaleHelper::localeToFlagIconsCSS($locale) }}"></span> {{ \LocaleHelper::getHumanReadableName($locale) }}
                                    </x-slot>
                                </x-squadms-default-theme::dropdown.item>
                            @endforeach
                        </x-slot>
                    </x-squadms-default-theme::navigation.dropdown>
                @endif
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
