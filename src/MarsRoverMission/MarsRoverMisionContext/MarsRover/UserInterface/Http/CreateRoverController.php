<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MarsRoverMission\MarsRoverMisionContext\Infrastructure\UserInterface\Http\Exception;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\Dto\CreateRoverCommandHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandDirector;
use Symfony\Component\HttpFoundation\Request;

final class CreateRoverController extends Controller
{

    public function __construct(private readonly CommandDirector $commandDirector)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {

        $roverCommand = $this->commandDirector->create(
            CreateRoverCommand::class,
            $request->get("startingPointX"),
            $request->get("startingPointY"),
            $request->get("direction")
        );

        /** @var CreateRoverCommandHandlerResponse $response */
        $response = $this->commandDirector->invokeSync($roverCommand);

        return response()->json(
            [
                "uuid" => $response?->getRoverUuid()->toString()
            ], Response::HTTP_CREATED);

    }
}
