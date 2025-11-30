<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\Dto;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\Dto\GetRoverQueryHandlerResponse;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Directions;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use PHPUnit\Framework\TestCase;

class GetRoverQueryHandlerResponseTest extends TestCase
{
    public function testCreateAndGetters()
    {
        $uuid = RoverUuid::generate();
        $coords = Coordinates::create(Position::create(7), Position::create(8));
        $dir = Directions::E;
        $dto = GetRoverQueryHandlerResponse::create($uuid, $coords, $dir);
        $this->assertSame($uuid, $dto->getRoverUuid());
        $this->assertSame($coords, $dto->getPosition());
        $this->assertSame($dir, $dto->getDirections());
    }
    public function testToArray()
    {
        $uuid = RoverUuid::generate();
        $coords = Coordinates::create(Position::create(7), Position::create(8));
        $dir = Directions::E;
        $dto = GetRoverQueryHandlerResponse::create($uuid, $coords, $dir);
        $arr = $dto->toArray();
        $this->assertEquals([
            'uuid'=>$uuid->toString(),
            'position'=>['x'=>7,'y'=>8],
            'direction'=>'E'
        ], $arr);
    }
}
