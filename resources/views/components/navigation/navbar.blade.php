@props(['htmlBrand' => false, 'brand', 'navLeft', 'navCenter', 'navRight', 'navExtra'])

<nav {{ $attributes->merge(['class' => 'navbar navbar-expand-lg navbar-light bg-light']) }}>
    <div class="container-fluid">
        @if ($htmlBrand)
            <a class="navbar-brand" href="{{ route('home') }}">
                {!! $brand !!}
            </a>
        @else
            <a class="navbar-brand" href="{{ route('home') }}">{{ $brand }}</a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{ $navLeft }}
            </ul>

            <!-- Center -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                {{ $navCenter }}
            </ul>

            <!-- Right -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{ $nacRight }}
            </ul>

            {{ $navExtra }}
        </div>
    </div>
</nav>
