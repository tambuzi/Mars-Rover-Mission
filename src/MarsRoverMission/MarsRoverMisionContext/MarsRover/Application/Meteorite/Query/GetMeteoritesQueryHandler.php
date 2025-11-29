<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\Dto\GetMeteoritesQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandHandler;

final class GetMeteoritesQueryHandler extends CommandHandler
{

    public function __construct(private readonly MeteoriteRepository $meteoriteRepository)
    {
    }

    public static function commandName(): string
    {
        return GetMeteoritesCommandQuery::class;
    }

    public function handle(?Command $command): GetMeteoritesQueryHandlerResponse
    {
        $meteorites = $this->meteoriteRepository->getAllMeteorites();

        return GetMeteoritesQueryHandlerResponse::create($meteorites);
    }
}
