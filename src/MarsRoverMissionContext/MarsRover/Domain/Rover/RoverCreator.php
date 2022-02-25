<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\Rover\Rover;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverRepository\RoverRepository;

use function PHPUnit\Framework\directoryExists;

class RoverCreator
{
    private RoverRepository $repository;

    public function __construct(RoverRepository $roverRepository)
    {
        $this->repository = $roverRepository;
    }

    public function createRover(int $roverId, Coordinates $startingPoint, string $direction)
    {
        return $this->repository->createRover($roverId, $startingPoint, $direction);
    }
}
