<?php

namespace MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command;


use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Service\CreateMeteoriteService;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\CommandHandler;


final class CreateMeteoriteCommandHandler extends CommandHandler
{

    public function __construct(
        private readonly MeteoriteRepository    $meteoriteRepository,
        private readonly CreateMeteoriteService $createMeteoriteService
    )
    {
    }

    public static function commandName(): string
    {
        return CreateMeteoriteCommand::class;
    }

    public function handle(?Command $command): void
    {
        $meteoriteCollection = MeteoriteCollection::emptyCollection();

        for ($i = 0; $i <= random_int(20, 100); $i++) {
            $meteorite = $this->createMeteoriteService->execute();
            $meteoriteCollection->addMeteorite($meteorite);
        }

        $this->meteoriteRepository->saveMeteorites($meteoriteCollection);
    }
}
