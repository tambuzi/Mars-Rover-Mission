<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverQueryHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverCommandQuery;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Model\RoverRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\Dto\GetRoverQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity\Rover;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use PHPUnit\Framework\TestCase;

class GetRoverQueryHandlerTest extends TestCase
{
    public function testStaticCommandName()
    {
        $this->assertEquals(
            \MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverCommandQuery::class,
            GetRoverQueryHandler::commandName()
        );
    }
    public function testHandleReturnsExpectedResult()
    {
        $repo = $this->createMock(RoverRepository::class);
        $rover = Rover::create(
            RoverUuid::generate(),
            Coordinates::create(Position::create(5), Position::create(10)),
            RoverDirection::create('E')
        );
        $repo->method('getRover')->willReturn($rover);
        $handler = new GetRoverQueryHandler($repo);
        $query = GetRoverCommandQuery::create($rover->getUuid()->toString());
        $result = $handler->handle($query);
        $this->assertInstanceOf(GetRoverQueryHandlerResponse::class, $result);
    }
}
