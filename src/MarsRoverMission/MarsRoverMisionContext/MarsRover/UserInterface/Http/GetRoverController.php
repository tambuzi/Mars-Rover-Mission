<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\Dto\GetRoverQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverCommandQuery;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandDirector;
use Symfony\Component\HttpFoundation\Request;

final class GetRoverController extends Controller
{


    public function __construct(private readonly CommandDirector $commandDirector)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {

        $roverCommand = $this->commandDirector->create(
            GetRoverCommandQuery::class,
            $request->query->get('uuid')
        );
        /** @var GetRoverQueryHandlerResponse $response */
        $response = $this->commandDirector->invokeSync($roverCommand);

        return response()->json($response->toArray(), Response::HTTP_OK);

    }
}
