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
                <div class="col-12 mb-4">
                    <div class="server bg-light bg-no-map bg-cover bg-center" server-id="{{ $server->id }}">
                        <div class="server-inner d-flex flex-column flex-md-row">
                            <div class="main-info d-flex flex-column flex-md-row align-items-md-center flex-md-grow-1 min-width-0">
                                <div class="flex-md-grow-1 min-width-0 d-flex align-items-center p-4">
                                    <span class="w-100 h3 text-truncate text-center text-md-start text-white mb-md-0 data-server-name data-show-online {{ $server->last_query_result->online() ? '' : 'd-none' }}">{{ $server->last_query_result->name() }}</span>
                                    <span class="w-100 h3 text-truncate text-center text-md-start text-secondary mb-md-0 data-show-offline {{ $server->last_query_result->online()  ? 'd-none' : '' }}">{{ $server->last_query_result->name() }}</span>
                                </div>

                                <div class="flex-grow-1 min-width-0 flex-md-grow-0 d-flex h-100 align-items-center justify-content-center p-2 px-md-4 extra">
                                    <span class="text-white data-show-online {{ $server->last_query_result->online()  ? '' : 'd-none' }}"><span class="data-count">{{ $server->last_query_result->count() }}</span>(+<span class="data-queue">{{ $server->last_query_result->queue() }}</span>)/<span class="data-slots">{{ $server->last_query_result->slots() }}</span>(+<span class="data-reserved">{{ $server->last_query_result->reserved() }}</span>) {{ __('sqms-default-theme::pages/servers.server.players') }}</span>
                                    <span class="text-danger text-truncate data-show-offline {{ $server->last_query_result->online()  ? 'd-none' : '' }}">{{ __('sqms-default-theme::pages/servers.server.offline') }}</span>
                                </div>
                            </div>
        
                            <div class="actions d-flex flex-row align-items-stretch">
                                <a href="{{ $server->connect_url }}" class="extra d-flex flex-grow-1 flex-md-grow-0 align-items-center justify-content-center px-3 py-2 px-md-4 py-md-1 text-decoration-none">
                                    <span class="text-steam lh-1"><i class="bi bi-controller"></i></span>
                                </a>
    
                                <a href="{{ Config::get('sqms-servers.routes.def.server.name', ['server' => $server]) }}" class="extra d-flex flex-grow-1 flex-md-grow-0 align-items-center justify-content-center px-3 py-2 px-md-4 py-md-1 text-decoration-none">
                                    <span class="text-primary lh-1"><i class="bi bi-info-circle-fill"></i></span>
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

@push('scripts')
<script src="{{ mix('js/public/server-status-listener.js', 'themes/sqms-default-theme') }}"></script>
@endpush