<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

interface MeteoriteRepository
{

    public function createMeteorite(Coordinates $position);

    public function searchMeteorite(Coordinates $position);

    public function createMeteoriteCollection();

    public function getAllMeteorites();
}
