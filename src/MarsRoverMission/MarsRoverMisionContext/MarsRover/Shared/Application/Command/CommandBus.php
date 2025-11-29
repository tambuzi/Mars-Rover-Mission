<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

interface CommandBus
{
    public function dispatchSync(SyncCommand $command);

    public function dispatchAsync(AsyncCommand $command): void;
}
