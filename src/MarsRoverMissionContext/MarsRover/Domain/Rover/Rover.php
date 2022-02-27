<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;

class Rover
{
    private RoverId $id;
    private Coordinates $position;
    private RoverDirection $direction;

    private function __contructor(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction)
    {
        $this->id = $roverId;
        $this->position = $startingPoint;
        $this->direction = $direction;
    }

    public static function create(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction)
    {
        return new Rover($roverId, $startingPoint, $direction);
    }
    public function updateCoordinates(Coordinates $position)
    {
        $this->position = $position;
    }
}
