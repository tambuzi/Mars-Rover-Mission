<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\SyncCommand;

final class GetMeteoritesCommandQuery implements SyncCommand
{
    public static function create(): self
    {
        return new self();
    }
}
