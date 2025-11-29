<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Service;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;


class CreateMeteoriteService
{
    public function execute(): Meteorite
    {
        $positionX = Position::create(random_int(0, 200));
        $positionY = Position::create(random_int(0, 200));
        $meteoriteCoordinates = Coordinates::create($positionX, $positionY);

        return Meteorite::create($meteoriteCoordinates);
    }


}
