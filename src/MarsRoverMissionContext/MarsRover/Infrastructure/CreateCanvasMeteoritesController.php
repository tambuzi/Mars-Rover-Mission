<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateCanvasMeteoritesController;


use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\CreateMeteoriteUseCase\CreateMeteoriteUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository\PersistanceRoverRepository;

class CreateCanvasMeteoritesController
{

    private CreateMeteoriteUseCase $canvas; 

    public function create()
    {
        try {
            
            $this->canvas = new CreateMeteoriteUseCase(new MeteoriteCreator(new PersistanceRoverRepository()));
            return $this->canvas->execute();
        } catch (Exception $error) {
            return $error;
        }
    }
}
