<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use PHPUnit\Framework\TestCase;

class MeteoriteTest extends TestCase
{
    public function testCreateAndGetPosition()
    {
        $x = Position::create(10);
        $y = Position::create(20);
        $coords = Coordinates::create($x, $y);
        $meteorite = Meteorite::create($coords);
        $this->assertInstanceOf(Meteorite::class, $meteorite);
        $this->assertSame($coords, $meteorite->getPosition());
    }
}
