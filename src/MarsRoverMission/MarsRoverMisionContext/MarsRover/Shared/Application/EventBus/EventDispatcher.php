<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\EventBus;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\AsyncCommand;

interface EventDispatcher
{
    public function dispatchCommand(AsyncCommand $command): void;

    public function dispatch();
}
