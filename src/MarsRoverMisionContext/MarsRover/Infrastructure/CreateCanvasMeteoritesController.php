<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure;


use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\CreateMeteoriteUseCase;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\Meteorite\MeteoriteCreator;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;

class CreateCanvasMeteoritesController
{

    private CreateMeteoriteUseCase $canvas;
    private PersistanceRoverRepository $persistanceRepository;

    public function __construct(PersistanceRoverRepository $persistanceRepository)
    {
        $this->persistanceRepository = $persistanceRepository;
    }

    public function create()
    {
        try {
            
            $this->canvas = new CreateMeteoriteUseCase(new MeteoriteCreator($this->persistanceRepository));
            return $this->canvas->execute();
        } catch (Exception $error) {
            return $error;
        }
    }
}
