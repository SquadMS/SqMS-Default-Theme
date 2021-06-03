@extends('sqms-default-theme::structure.layout')

@section('content')
<section class="mt-6">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h1>{{ __('sqms-default-theme::pages/servers.heading') }}</h1>
            </div>
        </div>
        <div class="row server-list">
            @foreach ($servers as $server)
                @php
                    $status = $server->getFrontendCache();    
                @endphp
                <div class="col-12 mb-4">
                    <div class="server bg-light bg-no-map bg-cover bg-center">
                        <div class="server-inner d-flex flex-column flex-md-row">
                            <div class="main-info d-flex flex-column flex-md-row align-items-md-center flex-md-grow-1">
                                <div class="flex-md-grow-1 d-flex align-items-center p-4">
                                    <span class="w-100 h2 text-truncate text-center text-md-start text-white mb-md-0">{{ $server->name }}</span>
                                </div>
                                <div class="flex-grow-1 flex-md-grow-0 d-flex h-100 align-items-center justify-content-center p-2 px-md-4 info">
                                    @if ($server->is_online)
                                        <span class="text-white">{{ \Illuminate\Support\Arr::get($status, 'playerCount', 0) }}(+{{ intval(\Illuminate\Support\Arr::get($status, 'queue', '0')) }})/{{ intval(\Illuminate\Support\Arr::get($status, 'slots', '0')) }}(+{{ \Illuminate\Support\Arr::get($status, 'reservedSlots', '0') }}) Spieler</span>
                                    @else
                                        <span class="text-danger">offline</span>
                                    @endif
                                    
                                </div>
                            </div>
        
                            <div class="actions d-flex flex-row align-items-stretch">
                                <a href="{{ $server->connect_url }}" class="d-flex flex-grow-1 flex-md-grow-0 align-items-center justify-content-center bg-transparent-steam-300 px-3 py-2 px-md-5 py-md-1 text-decoration-none">
                                    <span class="text-truncate"><i class="bi bi-controller"></i></span>
                                </a>
    
                                <a href="#" class="d-flex flex-grow-1 flex-md-grow-0 align-items-center justify-content-center bg-transparent-info-300 px-3 py-2 px-md-5 py-md-1 text-decoration-none">
                                    <span class="text-truncate"><i class="bi bi-info-circle-fill"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection