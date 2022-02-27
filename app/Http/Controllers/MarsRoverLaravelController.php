<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Laraveltip\MarsRoverMisionContext\MarsRover\Application\Rover\MoveRoverUseCase;
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
    private $response;


    public function __construct()
    {
        $this->persistanceRepository  = new PersistanceRoverRepository();
    }

    public function MarsRoverController(Request $request)
    {


        $this->roverPositionX = $request->input('roverPositionX');
        $this->roverPositionY = $request->input('roverPositionY');
        $this->direction = $request->input('direction');
        $this->movements = $request->input('movements');
        try {
            $this->createRoverController = new CreateRoverController($this->persistanceRepository);
            $this->createRoverController->create($this->roverPositionX, $this->roverPositionY, $this->direction);
        } catch (Exception $e) {
            return $e;
        }
        try {
            $this->createCanvasMeteoritesController = new CreateCanvasMeteoritesController($this->persistanceRepository);
            $this->createCanvasMeteoritesController->create();
        } catch (Exception $e) {
            return $e;
        }
        try {
            $this->moveRoverController = new MoveRoverController($this->persistanceRepository);

            $startPosition = $this->persistanceRepository->rover->getPosition()->pX->value() . ", " . $this->persistanceRepository->rover->getPosition()->pY->value();

            if ($this->moveRoverController->move($this->persistanceRepository->rover->getId(), $this->movements)) {

                $this->response = [
                    'statusCode' => 200,
                    'startPosition' => $startPosition,
                    'endPosition' => $this->persistanceRepository->rover->getPosition()->pX->value() . ", " . $this->persistanceRepository->rover->getPosition()->pY->value(),
                    'message' => "la nave ha llegado a su destino"
                ];
            } else {
                $this->response = [
                    'statusCode' => 200,
                    'startPosition' => $startPosition,
                    'endPosition' => $this->persistanceRepository->rover->getPosition()->pX->value() . ", " . $this->persistanceRepository->rover->getPosition()->pY->value(),
                    'message' => "la nave se ha detenido antes de colisionar"
                ];
            }
            echo json_encode($this->response);
        } catch (Exception $e) {
            return $e;
        }
    }
}
