<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\Dto;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;

final readonly class CreateRoverCommandHandlerResponse
{
    private function __construct(
        private RoverUuid $roverUuid
    )
    {
    }

    public static function create(RoverUuid $roverUuid): CreateRoverCommandHandlerResponse
    {
        return new self($roverUuid);
    }

    public function getRoverUuid(): RoverUuid
    {
        return $this->roverUuid;
    }
}
