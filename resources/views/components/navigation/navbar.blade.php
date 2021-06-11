@props(['htmlBrand' => false, 'container' => 'container', 'navLeft' => false, 'navCenter' => false, 'navRight' => false, 'navExtra' => false, 'brand'])

<nav {{ $attributes->merge(['class' => 'navbar navbar-expand-lg navbar-light bg-light']) }}>
    <div class="{{ $container }}">
        @if ($htmlBrand)
            <a class="navbar-brand" href="{{ route(Config::get('sqms.routes.def.home.name')) }}">
                {!! $brand !!}
            </a>
        @else
            <a class="navbar-brand" href="{{ route(Config::get('sqms.routes.def.home.name')) }}">{{ $brand }}</a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if ($navLeft)
                <!-- Left -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{ $navLeft }}
                </ul>
            @endif

            @if ($navCenter)
                <!-- Center -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    {{ $navCenter }}
                </ul>
            @endif

            @if ($navRight)
                <!-- Right -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    {{ $navRight }}
                </ul>
            @endif

            @if ($navExtra)
                {{ $navExtra }}
            @endif
        </div>
    </div>
</nav>
