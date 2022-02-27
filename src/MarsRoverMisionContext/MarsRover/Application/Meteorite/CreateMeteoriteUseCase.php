<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite;


use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection;


class CreateMeteoriteUseCase
{

    private $meteoriteCreatorRepository;
    private $meteoriteCoordinates;
    private array $meteorites;


    public function __construct(MeteoriteCreator $meteoriteCreator)
    {
        $this->meteoriteCreatorRepository = $meteoriteCreator;
    }

    public function execute()
    {
        $this->meteoriteCreatorRepository->createMeteoriteCollection();
        for ($i = 0; $i <= random_int(0, 30); $i++) {
            $this->positionX = new Position(random_int(0, 200));
            $this->positionY = new Position(random_int(0, 200));
            $this->meteoriteCoordinates = Coordinates::create($this->startingPointX, $this->startingPointY);

            return $this->meteoriteCreatorRepository->createMeteorite($this->meteoriteCoordinates);
        }
    }
}
