<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;

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
