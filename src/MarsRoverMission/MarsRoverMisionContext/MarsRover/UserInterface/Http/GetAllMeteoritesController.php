<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\Dto\GetMeteoritesQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesCommandQuery;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandDirector;
use Symfony\Component\HttpFoundation\Request;

final class GetAllMeteoritesController extends Controller
{

    public function __construct(private readonly CommandDirector $commandDirector)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {

        $query = $this->commandDirector->create(GetMeteoritesCommandQuery::class);
        /** @var GetMeteoritesQueryHandlerResponse $response */
        $response = $this->commandDirector->invokeSync($query);

        return response()->json($response->toArray(), Response::HTTP_OK);

    }
}
