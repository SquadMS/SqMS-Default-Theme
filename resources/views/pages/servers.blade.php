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
                            <span class="h2 text-truncate">{{ $server->name }}</span>
                        </div>
    
                        <div class="d-flex flex-row align-items-stretch">
                            <div class="d-flex align-items-center bg-steam px-5 py-4">
                                <a href="{{ $server->connect_url }}">
                                    <i class="bi bi-controller"></i>
                                </a>
                            </div>

                            <div class="d-flex align-items-center bg-info px-5 py-4">
                                <a href="#">
                                    <i class="bi bi-info-circle-fill"></i>
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