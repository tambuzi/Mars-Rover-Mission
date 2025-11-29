<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions;

use Illuminate\Http\Response;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions\BaseException;

class RoverNotFoundException extends BaseException
{
    public function __construct(RoverUuid $roverUuid)
    {
        parent::__construct('Rover not found: ' . $roverUuid->toString(), Response::HTTP_NOT_FOUND);
    }
}

