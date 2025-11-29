<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\Dto\GetRoverQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\RoverNotFoundException;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandHandler;

final class GetRoverQueryHandler extends CommandHandler
{
    public function __construct(
        private readonly RoverRepository $roverRepository
    )
    {
    }

    public static function commandName(): string
    {
        return GetRoverCommandQuery::class;
    }

    /** @param GetRoverCommandQuery $query */
    public function handle(?Command $query): GetRoverQueryHandlerResponse
    {

        $rover = $this->roverRepository->getRover(RoverUuid::fromString($query->getRoverUuid()));

        if (!$rover) {
            throw new RoverNotFoundException(RoverUuid::fromString($query->getRoverUuid()));
        }
        return GetRoverQueryHandlerResponse::fromRover($rover);
    }
}
