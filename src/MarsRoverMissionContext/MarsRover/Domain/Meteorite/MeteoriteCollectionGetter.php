<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollectionGetter;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Meteorite\Meteorite;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository\MeteoriteRepository;


class MeteoriteCollectionGetter
{
    private MeteoriteRepository $repository;

    public function __construct(MeteoriteRepository $meteoriteRepository)
    {
        $this->repository = $meteoriteRepository;
    }

    public function getCollection()
    {
        return $this->repository->getAllMeteorites();
    }
}
