<?php


namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite;



use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteSearcher;

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
