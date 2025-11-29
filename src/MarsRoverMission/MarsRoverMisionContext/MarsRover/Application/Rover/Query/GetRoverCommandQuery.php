<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\SyncCommand;

final readonly class GetRoverCommandQuery implements SyncCommand
{

    private function __construct(private string $roverUuid)
    {
    }

    public static function create(string $roverUuid): GetRoverCommandQuery
    {
        return new self($roverUuid);
    }

    public function getRoverUuid(): string
    {
        return $this->roverUuid;
    }
}
