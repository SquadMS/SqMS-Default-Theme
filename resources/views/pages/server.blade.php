@extends('sqms-default-theme::structure.layout')

@section('content')
<section class="bg-light bg-no-map bg-cover bg-center">
    <div class="container">
        <div class="row min-vh-50 align-items-stretch p-5">
            @if ($server->last_query_result->online())
                @foreach ($server->last_query_result->population()->getTeams() as $team)
                    <div class="col-12 col-md">
                        <div class="squad-flag p-md-4 d-flex justify-content-center align-items-center">
                            <div class="ratio ratio-squad-flag bg-faction-{{ \SquadMS\Foundation\Helpers\FactionHelper::getFactionTag($team->getName(), $server->last_query_result->layer()) }} bg-cover bg-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="gradient {{ $loop->first ? '' : 'right' }}position-absolute w-100 h-100"></div>
                                    <h2 class="text-white text-nowrap text-truncate w-100 px-2 mb-0" style="z-index: 1">{{ $team->getName() }}</iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($loop->first)
                        <div class="col-12 col-md-auto d-flex justify-content-center align-items-center">
                            <span class="text-primary h2">VS.</span>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col">
                    <p class="h3 text-center">Server offline :(</p>
                </div>
            @endif
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