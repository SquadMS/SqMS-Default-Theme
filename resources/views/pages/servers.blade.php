@extends('sqms-default-theme::structure.layout')

@section('content')
<section>
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h1>{{ __('sqms-default-theme::pages/servers.heading') }}</h1>
            </div>
        </div>
        <div class="row server-list">
            @foreach ($servers as $server)
                <div class="col-12 mb-4">
                    <div class="server d-flex flex-column flex-md-row bg-light">
                        <div class="d-flex align-items-center flex-md-grow-1 p-4">
                            <span class="w-100 h2 text-truncate text-center text-md-start">{{ $server->name }}</span>
                        </div>
    
                        <div class="d-flex flex-row align-items-stretch">
                            <a href="{{ $server->connect_url }}" class="d-flex flex-grow-1 flex-md-grow-0 align-items-center justify-content-center bg-steam-500 px-3 py-2 px-md-5 py-md-4">
                                <span class="text-truncate"><i class="bi bi-controller"></i> Join</span>
                            </a>

                            <a href="#" class="d-flex flex-grow-1 flex-md-grow-0 align-items-center justify-content-center bg-info-500 px-3 py-2 px-md-5 py-md-4">
                                <span class="text-truncate"><i class="bi bi-info-circle-fill"></i> Details</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection