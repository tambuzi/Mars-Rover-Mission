<?php

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\CreateMeteoriteUseCase\CreateMeteoriteUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository\MeteoriteRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection\MeteoriteCollection;

class GetMeteoritesUseCase
{
    private CreateMeteoriteUseCase $meteoriteCreatorUseCase;
    private MeteoriteCollection $meteoriteCollection;
    private array $meteorites;


    public function execute()
    {for ($i = 0; $i <= random_int(0, 30); $i++) {

        $meteorite = new CreateMeteoriteUseCase(new MeteoriteCreator(new MeteoriteRepository()));
        array_push($meteorites, $meteorite->execute());
    }
    return MeteoriteCollection::create($meteorites);
    }
}
