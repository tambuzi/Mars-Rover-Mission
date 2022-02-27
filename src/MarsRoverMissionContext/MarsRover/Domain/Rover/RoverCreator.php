<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository\RoverRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId\RoverId;

class RoverCreator
{
    private RoverRepository $repository;

    public function __construct(RoverRepository $roverRepository)
    {
        $this->repository = $roverRepository;
    }

    public function createRover(RoverId $roverId, Coordinates $startingPoint, RoverDirection $direction)
    {
        return $this->repository->createRover($roverId, $startingPoint, $direction);
    }
}