<?php

namespace App\Http\Controllers\MarsRoverLaravelController;

use App\Http\Controllers\Controller;
use Exception;
use Laraveltip\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position\Position;
use Illuminate\Http\Request;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateCanvasMeteoritesController\CreateCanvasMeteoritesController;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\CreateRoverController\CreateRoverController;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\MoveRoverController\MoveRoverController;
use Laraveltip\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository\PersistanceRoverRepository;

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
