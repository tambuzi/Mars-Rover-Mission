<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\Dto\CreateRoverCommandHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity\Rover;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandHandler;

final class CreateRoverCommandHandler extends CommandHandler
{
    public function __construct(
        private readonly RoverRepository $roverRepository
    )
    {
    }

    public static function commandName(): string
    {
        return CreateRoverCommand::class;
    }

    /** @param CreateRoverCommand $rover */
    public function handle(?Command $rover): CreateRoverCommandHandlerResponse
    {
        $roverUuid = RoverUuid::generate();
        $direction = RoverDirection::create($rover->getDirection());
        $startingPointX = Position::create($rover->getStartingPointX());
        $startingPointY = Position::create($rover->getStartingPointY());
        $roverCoordinates = Coordinates::create(
            $startingPointX,
            $startingPointY
        );

        $rover = Rover::create($roverUuid, $roverCoordinates, $direction);
        $this->roverRepository->save(
            $rover
        );
        return CreateRoverCommandHandlerResponse::create($rover->getUuid());
    }
}
