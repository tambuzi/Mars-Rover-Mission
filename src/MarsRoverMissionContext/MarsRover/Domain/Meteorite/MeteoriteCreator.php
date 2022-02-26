<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite\Meteorite;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository\MeteoriteRepository;


class MeteoriteCreator
{
    private MeteoriteRepository $repository;

    public function __construct(MeteoriteRepository $meteoriteRepository)
    {
        $this->repository = $meteoriteRepository;
    }

    public function createMeteorite(Coordinates $position)
    {
        return $this->repository->createMeteorite($position);
    }
}
