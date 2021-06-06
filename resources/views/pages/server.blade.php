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
        <div class="row mb-5">
            <div class="col">
                <h1 class="text-center">{{ $server->last_query_result->name() }}</h1>
            </div>
        </div>
        <div class="row">
            @if ($server->last_query_result->online())
                @foreach ($server->last_query_result->population()->getTeams() as $team)
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col">
                                <h2 class="text-nowrap text-truncate text-center lh-0">
                                    <img src="{{ asset('themes/sqms-default-theme/static-images/factions/' . \SquadMS\Foundation\Helpers\FactionHelper::getFactionTag($team->getName(), $server->last_query_result->layer()) . '.svg') }}" style="height: 1em" />
                                    {{ $team->getName() }}
                                </h2>
                            </div>
                        </div>

                        @if (!count($team->getSquads()) && !count($team->getPlayers()))
                            <div class="row">
                                <div class="col">
                                    <p class="lead text-center">No players online</p>
                                </div>
                            </div>
                        @endif

                        <!-- Squads -->
                        @if (count($team->getSquads()))
                            @foreach ($team->getSquads() as $squad)
                                <!-- Squad -->
                                <div class="row squad" squad-id="{{ $squad->getId() }}">
                                    <div class="col-12">
                                        <div class="title d-flex align-items-center bg-light p-2">
                                            <h5 class="text-truncate mb-0">
                                                <span class="squad-id badge bg-secondary me-2">#{{ $squad->getId() }}</span>{{ $squad->getName() }}
                                            </h5>
                                        </div>
                                        <div class="players d-flex flex-column">
                                            @foreach ($squad->getPlayers() as $player)
                                            <div class="player d-flex min-width-0 p-2 border-start border-end border-bottom border-light" player-id="{{ $player->getSteamId() }}">
                                                <a href="{{ route('profile', $player->getSteamId()) }}" class="text-truncate text-decoration-none">{{ $player->getName() }}</a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- Unassigned Players -->
                        @if (count($team->getPlayers()))
                            <!-- Squad -->
                            <div class="row squad" squad-id="TEAM">
                                <div class="col-12">
                                    <div class="title d-flex align-items-center bg-light p-2">
                                        <h5 class="text-truncate mb-0">
                                            Unassigned
                                        </h5>
                                    </div>
                                    <div class="players d-flex flex-column">
                                        @foreach ($team->getPlayers() as $player)
                                        <div class="player d-flex min-width-0 p-2 border-start border-end border-bottom border-light" player-id="{{ $player->getSteamId() }}">
                                            <a href="{{ route('profile', $player->getSteamId()) }}" class="text-truncate text-decoration-none">{{ $player->getName() }}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="col">
                    <p class="lead text-danger">Server is offline :(</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ mix('js/public/server-status-listener.js', 'themes/sqms-default-theme') }}"></script>
@endpush