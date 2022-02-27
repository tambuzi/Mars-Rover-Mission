<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverId;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;

class CreateRoverUseCase
{

    private $roverCreatorRepository;
    private $roverCoordinates;
    private $roverId;
    private $roverDirection;

    public function __construct(RoverCreator $roverCreator)
    {
        $this->RoverCreatorRepository = $roverCreator;
    }

    public function execute(RoverDTO $rover)
    {
        $this->roverId = new RoverId($rover->id);
        $this->direction = new RoverDirection($rover->direction);
        $this->startingPointX = new Position($rover->startingPointX);
        $this->startingPointY = new Position($rover->startingPointY);
        $this->roverCoordinates = Coordinates::create($this->startingPointX, $this->startingPointY);

        $this->roverCreatorRepository->createRover($this->roverId, $this->roverCoordinates, $this->roverDirection);
    }
}
