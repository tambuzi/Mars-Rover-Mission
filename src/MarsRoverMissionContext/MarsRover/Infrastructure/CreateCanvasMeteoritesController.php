<?php

namespace Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateCanvasMeteoritesController;


use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Meteorite\GetMeteoritesUseCase\GetMeteoritesUseCase;

class CreateCanvasMeteoritesController
{

    private GetMeteoritesUseCase $canvas; 

    public function create()
    {
        try {
            $this->canvas = new GetMeteoritesUseCase();
            return $this->canvas->execute();
        } catch (Exception $error) {
            return $error;
        }
    }
}
