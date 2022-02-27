<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;

interface MeteoriteRepository
{

    public function createMeteorite(Coordinates $position);

    public function searchMeteorite(Coordinates $position);

    public function createMeteoriteCollection();

    public function getAllMeteorites();
}
