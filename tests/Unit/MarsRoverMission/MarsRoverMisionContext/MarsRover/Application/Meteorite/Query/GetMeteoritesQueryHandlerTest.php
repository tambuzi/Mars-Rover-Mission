<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesQueryHandler;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesCommandQuery;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Model\MeteoriteRepository;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\Dto\GetMeteoritesQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use PHPUnit\Framework\TestCase;

class GetMeteoritesQueryHandlerTest extends TestCase
{
    public function testStaticCommandName()
    {
        $this->assertEquals(
            \MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesCommandQuery::class,
            GetMeteoritesQueryHandler::commandName()
        );
    }
    public function testHandleReturnsRepositoryResult()
    {
        $repo = $this->createMock(MeteoriteRepository::class);
        $collection = MeteoriteCollection::emptyCollection();
        $repo->method('getAllMeteorites')->willReturn($collection);
        $handler = new GetMeteoritesQueryHandler($repo);
        $query = GetMeteoritesCommandQuery::create();
        $result = $handler->handle($query);
        $this->assertInstanceOf(GetMeteoritesQueryHandlerResponse::class, $result);
    }
}
