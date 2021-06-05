@extends('sqms-default-theme::structure.layout')

@section('content')
<section class="min-vh-50">
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($server->last_query_result->population()->getTeams() as $team)
                <div class="embed-responsive embed-responsive-squad-flag {{ (new FactionHelper())->getClassNameForFaction($team->getName(), $layer) }} bg-cover bg-center">
                    <div class="embed-responsive-item d-flex justify-content-center align-items-center">
                        <div class="gradient position-absolute w-100 h-100"></div>
                        <h2 class="text-white text-nowrap text-truncate w-100 px-2 mb-0" style="z-index: 1">{{ $team->getName() }}</iframe>
                    </div>
                </div>
                @foreach
            </div>
        </div>
    </div>
</section>
<section class="mt-6">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h1>{{ $server->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p clasS="lead">Coming Soon.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ mix('js/public/server-status-listener.js', 'themes/sqms-default-theme') }}"></script>
@endpush