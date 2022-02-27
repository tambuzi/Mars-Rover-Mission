<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;

class Rover
{
    private RoverId $id;
    private Coordinates $position;
    private RoverDirection $direction;

    public function __construct(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction)
    {
        $this->id = $roverId;
        $this->position = $startingPoint;
        $this->direction = $direction;
    }

    public function updateCoordinates(Coordinates $position)
    {
        $this->position = $position;
    }

    public function getId()
    {
        return $this->id->value();
    }
    public function getPosition()
    {
        return $this->position;
    }

    public function getDirection()
    {
        return $this->direction->value();
    }
}
