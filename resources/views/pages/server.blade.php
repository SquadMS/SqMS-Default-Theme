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
                                    <div class="gradient {{ $loop->first ? '' : 'right' }} position-absolute w-100 h-100"></div>
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
<section class="my-6">
    <div class="container">
        <!-- Server name -->
        <div class="row mb-5">
            <div class="col">
                <h1 class="text-center">{{ $server->last_query_result->name() }}</h1>
            </div>
        </div>

        <!-- Population -->
        <div class="row">
            @if ($server->last_query_result->population())
                @foreach ($server->last_query_result->population()->getTeams() as $team)
                    <div class="col-12 col-md-6">
                        <x-sqms-default-theme::player-list.team :player="$team" />
                    </div>
                @endforeach
            @elseif ($server->has_rcon_data)
                <div class="col">
                    <p class="lead text-danger">No population data available :(</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ mix('js/public/server-status-listener.js', 'themes/sqms-default-theme') }}"></script>
@endpush