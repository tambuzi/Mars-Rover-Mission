<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;

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
