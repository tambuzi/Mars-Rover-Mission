<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteSearcher;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository\MeteoriteRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;

class MeteoriteSearcher
{

    private MeteoriteRepository $repository;

    public function __construct(MeteoriteRepository $meteoriteRepository)
    {
        $this->repository = $meteoriteRepository;
    }
    public function searchMeteorite(Coordinates $coordinates)
    {
        return $this->repository->searchMeteorite($coordinates);
    }
}
