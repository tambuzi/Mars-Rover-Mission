<?php
namespace Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite;

use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\CreateMeteoriteUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteRepository;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCollection;

class GetMeteoritesUseCase
{

    private array $meteorites;


    public function execute()
    {for ($i = 0; $i <= random_int(0, 30); $i++) {

        $meteorite = new CreateMeteoriteUseCase(new MeteoriteCreator(new MeteoriteRepository()));
        array_push($meteorites, $meteorite->execute());
    }
    return MeteoriteCollection::create($meteorites);
    }
}
