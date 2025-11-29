<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

interface AsyncCommand extends Command
{
    public function toArray(): array;
}
