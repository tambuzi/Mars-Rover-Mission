<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

class Rover
{
    private int $id;
    private Coordinates $startingPoint;
    private string $direction;

    private function __contructor(int $roverId, Coordinates $startingPoint, string $direction)
    {
        $this->id = $roverId;
        $this->startingPoint = $startingPoint;
        $this->direction = $direction;
    }

    public function create(int $roverId, Coordinates $startingPoint, string $direction)
    {
        return new Rover($roverId, $startingPoint, $direction);
    }
}
