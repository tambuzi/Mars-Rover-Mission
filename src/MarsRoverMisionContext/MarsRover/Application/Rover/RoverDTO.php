<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover;

class RoverDTO
{

    public int $id;
    public int $startingPointX;
    public int $startingPointY;
    public string $direction;

    public function __construct(int $id, int $startingPointX, int $startingPointY, string $direction)
    {
        $this->id = $id;
        $this->startingPointX = $startingPointX;
        $this->startingPointY = $startingPointY;
        $this->direction = $direction;
    }

    public function create(int $id, int $startingPointX, int $startingPointY, string $direction)
    {
        return new RoverDTO($id, $startingPointX, $startingPointY, $direction);
    }
}
