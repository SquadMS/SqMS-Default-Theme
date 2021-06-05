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
<section class="mt-6">
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
                            <div class="col-12 col-md-6">
                                <h2 class="text-nowrap text-truncate">
                                    <div class="ratio ratio-squad-flag d-inline-block bg-faction-{{ \SquadMS\Foundation\Helpers\FactionHelper::getFactionTag($team->getName(), $server->last_query_result->layer()) }} bg-cover bg-center"  style="width: 1em">
                                        <div></div>
                                    </div>
                                    {{ $team->getName() }}
                                </h2>
                            </div>
                        </div>

                        <!-- Squads -->
                        @if (count($team->getSquads()))
                            @foreach ($team->getSquads() as $squad)
                                <!-- Squad -->
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" class="text-left">#{{ $squad->getId() }}</th>
                                                    <th scope="col" class="text-right">{{ $squad->getName() }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($squad->getPlayers() as $player)
                                                <tr>
                                                    <td colspan="2" class="text-white"><a href="{{ route('profile', $player->getSteamId()) }}">{{ $player->getName() }}</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- Unassigned Players -->
                        @if (count($team->getPlayers()))
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">-</th>
                                            <th scope="col">Unassigned</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($team->getPlayers() as $player)
                                        <tr>
                                            <td colspan="2" class="text-white"><a href="{{ route('profile', $player->getSteamId()) }}">{{ $player->getName() }}</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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