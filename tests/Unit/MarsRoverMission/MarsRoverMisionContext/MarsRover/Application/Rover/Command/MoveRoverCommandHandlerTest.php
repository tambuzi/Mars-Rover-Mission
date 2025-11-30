<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity\Rover;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use PHPUnit\Framework\TestCase;

class MoveRoverCommandHandlerTest extends TestCase
{
    public function testStaticCommandName()
    {
        $this->assertEquals(
            \MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommand::class,
            MoveRoverCommandHandler::commandName()
        );
    }
    public function testHandleNoExceptionIfRoverExists()
    {
        $roverRepo = $this->createMock(RoverRepository::class);
        $meteoriteRepo = $this->createMock(MeteoriteRepository::class);
        $rover = Rover::create(
            RoverUuid::generate(),
            Coordinates::create(Position::create(0), Position::create(0)),
            RoverDirection::create('N')
        );
        $roverRepo->method('getRover')->willReturn($rover);
        $meteoriteRepo->method('getAllMeteorites')->willReturn(MeteoriteCollection::emptyCollection());
        $handler = new MoveRoverCommandHandler($roverRepo, $meteoriteRepo);
        $command = MoveRoverCommand::create($rover->getUuid()->toString(), 'F');
        $handler->handle($command);
        $this->assertTrue(true);
    }
}
