<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;

interface MeteoriteRepository
{

    public function getAllMeteorites(): MeteoriteCollection;

    public function saveMeteorites(MeteoriteCollection $meteoriteCollection): void;
}
