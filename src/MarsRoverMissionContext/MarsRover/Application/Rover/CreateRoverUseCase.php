<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\CreateRover;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\RoverDTO\RoverDTO;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Rover\RoverCreator\RoverCreator;

class CreateRoverUseCase
{

    private $roverCreatorRepository;
    private $roverCoordinates;
    private $roverCoordinatesRepository;

    public function __construct(RoverCreator $roverCreator)
    {
        $this->RoverCreatorRepository = $roverCreator;

    }

    public function execute(RoverDTO $rover)
    {
        $this->roverCoordinates = Coordinates::create($rover->startingPointX, $rover->startingPointY);

        $this->roverCreatorRepository->createRover($rover->id, $this->roverCoordinates, $rover->direction);
    }
}
