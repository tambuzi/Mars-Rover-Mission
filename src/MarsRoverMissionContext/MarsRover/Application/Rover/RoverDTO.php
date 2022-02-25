<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverDTO;

class RoverDTO
{

    private int $id;
    private int $startingPointX;
    private int $startingPointY;
    private string $direction;

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
