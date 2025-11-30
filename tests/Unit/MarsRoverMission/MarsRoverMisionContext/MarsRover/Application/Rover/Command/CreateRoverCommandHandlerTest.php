<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommandHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommand;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\Dto\CreateRoverCommandHandlerResponse;
use PHPUnit\Framework\TestCase;

class CreateRoverCommandHandlerTest extends TestCase
{
    public function testStaticCommandName()
    {
        $this->assertEquals(
            \MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommand::class,
            CreateRoverCommandHandler::commandName()
        );
    }
    public function testHandleReturnsExpectedDTO()
    {
        $repo = $this->createMock(RoverRepository::class);
        $handler = new CreateRoverCommandHandler($repo);
        $command = CreateRoverCommand::create(5, 10, 'N');
        $response = $handler->handle($command);
        $this->assertInstanceOf(CreateRoverCommandHandlerResponse::class, $response);
    }
}
