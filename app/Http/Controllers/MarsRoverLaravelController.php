<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Infrastructure\Persistance\PersistanceRoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\CreateCanvasMeteoritesController;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\CreateRoverController;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http\MoveRoverController;

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


    public function __construct(CreateRoverController $createRoverController, CreateCanvasMeteoritesController $createCanvasMeteoritesController, MoveRoverController $moveRoverController)
    {
        $this->createRoverController = $createRoverController;
        $this->createCanvasMeteoritesController = $createCanvasMeteoritesController;
        $this->moveRoverController = $moveRoverController;
    }

    public function MarsRoverController(Request $request)
    {


        $this->roverPositionX = $request->input('roverPositionX');
        $this->roverPositionY = $request->input('roverPositionY');
        $this->direction = $request->input('direction');
        $this->movements = $request->input('movements');
//        try {
//            $this->createRoverController->create($this->roverPositionX, $this->roverPositionY, $this->direction);
//        } catch (Exception $e) {
//            return $e;
//        }
//        try {
//            $this->createCanvasMeteoritesController->create();
//        } catch (Exception $e) {
//            return $e;
//        }
//        try {
//
//            $startPosition = $this->persistanceRepository->rover->getPosition()->pX->value() . ", " . $this->persistanceRepository->rover->getPosition()->pY->value();
//
//            if ($this->moveRoverController->move($this->persistanceRepository->rover->getUuid(), $this->movements)) {
//
//                $this->response = [
//                    'statusCode' => 200,
//                    'startPosition' => $startPosition,
//                    'endPosition' => $this->persistanceRepository->rover->getPosition()->pX->value() . ", " . $this->persistanceRepository->rover->getPosition()->pY->value(),
//                    'message' => "la nave ha llegado a su destino"
//                ];
//            } else {
//                $this->response = [
//                    'statusCode' => 200,
//                    'startPosition' => $startPosition,
//                    'endPosition' => $this->persistanceRepository->rover->getPosition()->pX->value() . ", " . $this->persistanceRepository->rover->getPosition()->pY->value(),
//                    'message' => "la nave se ha detenido antes de colisionar"
//                ];
//            }
//            echo json_encode($this->response);
//        } catch (Exception $e) {
//            return $e;
//        }
    }
}
