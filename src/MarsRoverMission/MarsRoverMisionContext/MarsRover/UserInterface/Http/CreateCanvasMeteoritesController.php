<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MarsRoverMission\MarsRoverMisionContext\Infrastructure\UserInterface\Http\Exception;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandDirector;

final class CreateCanvasMeteoritesController extends Controller
{

    public function __construct(private readonly CommandDirector $commandDirector)
    {
    }

    public function __invoke(): Response
    {
        $command = $this->commandDirector->create(CreateMeteoriteCommand::class);
        $this->commandDirector->invokeSync($command);

        return response()->noContent(Response::HTTP_CREATED);
    }
}
