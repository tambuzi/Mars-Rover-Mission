<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite;


use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection;


class CreateMeteoriteUseCase
{

    private MeteoriteCreator $meteoriteCreatorRepository;
    private Coordinates $meteoriteCoordinates;
    private Position $positionX;
    private Position $positionY;


    public function __construct(MeteoriteCreator $meteoriteCreator)
    {
        $this->meteoriteCreatorRepository = $meteoriteCreator;
    }

    public function execute()
    {
        $this->meteoriteCreatorRepository->createMeteoriteCollection();
        for ($i = 0; $i <= random_int(20, 100); $i++) {
            $this->positionX = new Position(random_int(0, 200));
            $this->positionY = new Position(random_int(0, 200));
            $this->meteoriteCoordinates =  new Coordinates($this->positionX, $this->positionY);
            
            $this->meteoriteCreatorRepository->createMeteorite($this->meteoriteCoordinates);
        }
    }
}
