<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Illuminate\Routing\Controller;
use MarsRoverMission\MarsRoverMisionContext\Infrastructure\UserInterface\Http\Exception;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandDirector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class MoveRoverController extends Controller
{

    public function __construct(private readonly CommandDirector $commandDirector)
    {
    }

    public function __invoke(Request $request): Response
    {
        $command = $this->commandDirector->create(MoveRoverCommand::class,
            $request->get("uuid"),
            $request->get("movements")
        );

        $this->commandDirector->invokeAsync($command);
        return response()->noContent(Response::HTTP_OK);
    }
}
