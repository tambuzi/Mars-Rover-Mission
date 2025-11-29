<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\RoverNotFoundException;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movement;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\MovementCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandHandler;

final class MoveRoverCommandHandler extends CommandHandler
{

    public function __construct(
        private readonly RoverRepository $roverRepository,
        private readonly MeteoriteRepository $meteoriteRepository
    )
    {
    }

    public static function commandName(): string
    {
        return MoveRoverCommand::class;
    }

    /** @param MoveRoverCommand $command */
    public function handle(?Command $command): void
    {
        $movements = MovementCollection::emptyCollection();
        $roverUuid = RoverUuid::fromString($command->getRoverUuid());
        foreach ($command->getMove() as $movement) {
            $movements->addMovement(Movement::create($movement));
        }

        $rover = $this->roverRepository->getRover($roverUuid);

        if (!$rover) {
            throw new RoverNotFoundException($roverUuid);
        }

        $meteorites = $this->meteoriteRepository->getAllMeteorites();

        $rover->moveRover($movements, $meteorites);
        $this->roverRepository->save($rover);
    }
}
