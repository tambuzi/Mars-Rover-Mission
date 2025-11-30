<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Rover\Entity\Rover;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverDirection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Directions;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\MovementCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function testCreateAndGetters()
    {
        $uuid = RoverUuid::generate();
        $x = Position::create(3);
        $y = Position::create(4);
        $coords = Coordinates::create($x, $y);
        $dir = RoverDirection::create('N');
        $rover = Rover::create($uuid, $coords, $dir);
        $this->assertSame($uuid, $rover->getUuid());
        $this->assertSame($coords, $rover->getPosition());
        $this->assertEquals(Directions::N, $rover->getDirection());
    }

    public function testUpdateCoordinates()
    {
        $uuid = RoverUuid::generate();
        $coordA = Coordinates::create(Position::create(1), Position::create(2));
        $dir = RoverDirection::create('N');
        $rover = Rover::create($uuid, $coordA, $dir);
        $coordB = Coordinates::create(Position::create(10), Position::create(20));
        $rover->updateCoordinates($coordB);
        $this->assertSame($coordB, $rover->getPosition());
    }

    public function testMoveRoverCanBeCalled()
    {
        $uuid = RoverUuid::generate();
        $coords = Coordinates::create(Position::create(0), Position::create(0));
        $dir = RoverDirection::create('N');
        $rover = Rover::create($uuid, $coords, $dir);
        $movements = $this->createStub(MovementCollection::class);
        $movements->method('getMovements')->willReturn([]);
        $meteorites = $this->createStub(MeteoriteCollection::class);
        $result = $rover->moveRover($movements, $meteorites);
        $this->assertSame($rover, $result);
    }
}
