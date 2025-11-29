<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

abstract class CommandHandler
{
    abstract public function handle(?Command $command);

   abstract public static function commandName(): string;

}
