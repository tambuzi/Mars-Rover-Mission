<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use Illuminate\Http\Response;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Exceptions\BaseException;

class MeteoriteCollisionExtension extends BaseException
{

    public function __construct(Coordinates $coordinates)
    {
        parent::__construct("Rover collide with a meteorite in coordinates: [" .
            $coordinates->getX()->value() . ", " .
            $coordinates->getY()->value() . "]", Response::HTTP_BAD_REQUEST);
    }
}
