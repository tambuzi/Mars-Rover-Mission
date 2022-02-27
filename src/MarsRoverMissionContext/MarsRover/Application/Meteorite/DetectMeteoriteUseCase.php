<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\DetectObstacleUseCase;


use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection\MeteoriteCollection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteSearcher\MeteoriteSearcher;

class DetectObstacleUseCase
{

    private $meteoriteSearcherRepository;



    public function __construct(MeteoriteSearcher $meteoriteSearcher)
    {
        $this->meteoriteSearcherRepository = $meteoriteSearcher;
    }

    public function execute(Coordinates $coordinates)
    {
            return $this->meteoriteSearcherRepository->searchMeteorite($coordinates);
    }
}
