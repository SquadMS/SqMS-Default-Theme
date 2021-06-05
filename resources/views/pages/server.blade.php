@extends('sqms-default-theme::structure.layout')

@section('content')
<section class="min-vh-50">
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($server->last_query_result->online())
                    @foreach ($server->last_query_result->population()->getTeams() as $team)
                    <div class="embed-responsive embed-responsive-squad-flag bg-faction-{{ \SquadMS\Foundation\Helpers\FactionHelper::getFactionTag($team->getName(), $server->last_query_result->layer()) }} bg-cover bg-center">
                        <div class="embed-responsive-item d-flex justify-content-center align-items-center">
                            <div class="gradient position-absolute w-100 h-100"></div>
                            <h2 class="text-white text-nowrap text-truncate w-100 px-2 mb-0" style="z-index: 1">{{ $team->getName() }}</iframe>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="h3">Server offline :(</p>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="mt-6">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h1>{{ $server->last_query_result->name() }}</h1>
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