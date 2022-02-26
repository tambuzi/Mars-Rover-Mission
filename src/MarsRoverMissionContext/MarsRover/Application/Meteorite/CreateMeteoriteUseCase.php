<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\CreateMeteoriteUseCase;


use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position\Position;

class CreateMeteoriteUseCase
{

    private $meteoriteCreatorRepository;
    private $meteoriteCoordinates;


    public function __construct(MeteoriteCreator $meteoriteCreator)
    {
        $this->meteoriteCreatorRepository = $meteoriteCreator;
    }

    public function execute()
    {
        for ($i = 0; $i <= random_int(0, 30); $i++) {
            $this->positionX = new Position(random_int(0, 200));
            $this->positionY = new Position(random_int(0, 200));
            $this->meteoriteCoordinates = Coordinates::create($this->startingPointX, $this->startingPointY);

            $this->meteoriteCreatorRepository->createMeteorite($this->meteoriteCoordinates);
        }
    }
}
