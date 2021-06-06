<div>
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
                <p class="lead text-center">There are no players in this team</p>
            </div>
        </div>
    @else
        <!-- Squads -->
        @if (count($team->getSquads()))
            @foreach ($team->getSquads() as $squad)
                <x-sqms-default-theme::player-list.squad :id="$squad->getId()" :name="$squad->getName()" :players="$squad->getPlayers()" />
            @endforeach
        @endif

        <!-- Unassigned Players -->
        @if (count($team->getPlayers()))
            <x-sqms-default-theme::player-list.squad :players="$team->getPlayers()" />
        @endif
    @endif
</div>