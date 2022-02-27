<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\DetectMeteoriteUseCase;


use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates\Coordinates\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection\MeteoriteCollection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteSearcher\MeteoriteSearcher;

class DetectMeteoriteUseCase
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
