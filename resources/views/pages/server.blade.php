@extends('sqms-default-theme::structure.layout', [
    'mainClass' => 'server',
    'mainAttributes' => 'server-id="$server->id"'
])

@section('content')
<section class="bg-light bg-no-map {{ $server->last_query_result->online() ? 'bg-' . \SquadMS\Foundation\Helpers\LevelHelper::levelToClass($server->last_query_result->level()) : '' }} bg-cover bg-center" server-level-bg="{{ $server->last_query_result->online() ? 'bg-' . \SquadMS\Foundation\Helpers\LevelHelper::levelToClass($server->last_query_result->level()) : '' }}">
    <div class="container">
        <div class="row min-vh-50 align-items-center p-5">
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
                <h1 class="text-center text-truncate data-server-name">{{ $server->last_query_result->name() }}</h1>
                <p class="lead">
                    <span class="text-white data-show-online {{ $server->last_query_result->online()  ? '' : 'd-none' }}"><span class="data-count">{{ $server->last_query_result->count() }}</span>(+<span class="data-queue">{{ $server->last_query_result->queue() }}</span>)/<span class="data-slots">{{ $server->last_query_result->slots() }}</span>(+<span class="data-reserved">{{ $server->last_query_result->reserved() }}</span>) {{ __('sqms-default-theme::pages/servers.server.players') }}</span>
                    <span class="text-danger text-truncate data-show-offline {{ $server->last_query_result->online()  ? 'd-none' : '' }}">{{ __('sqms-default-theme::pages/servers.server.offline') }}</span>
                </p>
            </div>
        </div>

        <!-- Population -->
        <div class="row data-player-list">
            @if ($server->last_query_result->population())
                @foreach ($server->last_query_result->population()->getTeams() as $team)
                    <div class="col-12 col-md-6">
                        <x-sqms-default-theme::player-list.team :team="$team" :server="$server" />
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* Initialize and listen for server status updates */
        const listener = new window.ServerStatusListener({
            levelClass: [
                'data-level-class',
                function(element, value) {
                    const oldClass = element.getAttribute('server-level-bg');
                    const newClass = `bg-${value}`;
                    
                    /* Remove old class and add new one */
                    element.classList.remove(oldClass);
                    element.classList.add(newClass);

                    /* Set server-level-bg attribute properly */
                    element.setAttribute('server-level-bg', newClass);
                },
            ],
        });
    });
</script>
@endpush