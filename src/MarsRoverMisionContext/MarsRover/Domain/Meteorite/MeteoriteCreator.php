<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository;


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

    public function createMeteoriteCollection()
    {
        return $this->repository->createMeteoriteCollection();
    }
}
