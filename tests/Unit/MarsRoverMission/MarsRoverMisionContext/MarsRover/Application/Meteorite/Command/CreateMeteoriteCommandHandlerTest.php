<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Service\CreateMeteoriteService;
use PHPUnit\Framework\TestCase;

class CreateMeteoriteCommandHandlerTest extends TestCase
{
    public function testStaticCommandName()
    {
        $this->assertEquals(
            \MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommand::class,
            CreateMeteoriteCommandHandler::commandName()
        );
    }
    public function testHandleCallsSaveMeteorites()
    {
        $repo = $this->createMock(MeteoriteRepository::class);
        $service = new CreateMeteoriteService();
        $handler = new CreateMeteoriteCommandHandler($repo, $service);
        $repo->expects($this->once())->method('saveMeteorites');
        $command = CreateMeteoriteCommand::create();
        $handler->handle($command);
        $this->assertTrue(true);
    }
}
