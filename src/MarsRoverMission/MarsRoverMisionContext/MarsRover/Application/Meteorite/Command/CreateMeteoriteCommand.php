<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\SyncCommand;

final class CreateMeteoriteCommand implements SyncCommand
{
    public static function create(): self
    {
        return new self();
    }

}
