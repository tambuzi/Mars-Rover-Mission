<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateCanvasMeteoritesController;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateRoverController;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\MoveRoverController;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;

class MarsRoverLaravelController extends Controller
{
    private int $roverPositionX;
    private int $roverPositionY;
    private string $direction;
    private string $movements;
    private PersistanceRoverRepository $persistanceRepository;
    private CreateRoverController $createRoverController;
    private CreateCanvasMeteoritesController $createCanvasMeteoritesController;
    private MoveRoverController $moveRoverController;


    public function __construct()
    {
        $this->persistanceRepository  = new PersistanceRoverRepository();
    }

    public function MarsRoverController(Request $request)
    {
        $this->roverPositionX = $request->roverPositionX;
        $this->roverPositionY = $request->roverPositionY;
        $this->direction = $request->direction;
        $this->movements = $request->movements;
        try {
            $this->createRoverController = new CreateRoverController($this->persistanceRepository);
        } catch (Exception $e) {
            return $e;
        }
    }
}
