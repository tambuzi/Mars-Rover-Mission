<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\Dto;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\Dto\GetMeteoritesQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use PHPUnit\Framework\TestCase;

class GetMeteoritesQueryHandlerResponseTest extends TestCase
{
    public function testCreateAndGetMeteorites()
    {
        $meteorite = Meteorite::create(Coordinates::create(Position::create(10), Position::create(21)));
        $collection = MeteoriteCollection::create([$meteorite]);
        $dto = GetMeteoritesQueryHandlerResponse::create($collection);
        $this->assertSame($collection, $dto->getMeteorites());
    }

    public function testToArrayReturnsExpectedFormat()
    {
        $meteorite = Meteorite::create(Coordinates::create(Position::create(10), Position::create(21)));
        $collection = MeteoriteCollection::create([$meteorite]);

        $dto = GetMeteoritesQueryHandlerResponse::create($collection);
        $arr = $dto->toArray();
        $this->assertIsArray($arr);
        $this->assertEquals(
            [['key'=>0, 'position'=>['x'=>10, 'y'=>21]]],
            $arr
        );
    }
}
