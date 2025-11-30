<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\ValueObject\MeteoriteCollection;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Coordinates;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use PHPUnit\Framework\TestCase;

class MeteoriteCollectionTest extends TestCase
{
    public function testEmptyCollection()
    {
        $collection = MeteoriteCollection::emptyCollection();
        $this->assertInstanceOf(MeteoriteCollection::class, $collection);
        $this->assertIsArray($collection->toArray());
        $this->assertCount(0, $collection->toArray());
    }

    public function testAddMeteorite()
    {
        $collection = MeteoriteCollection::emptyCollection();
        $meteorite = Meteorite::create(Coordinates::create(Position::create(10), Position::create(20)));
        $collection->addMeteorite($meteorite);
        $this->assertCount(1, $collection->toArray());
        $this->assertSame($meteorite, $collection->toArray()[0]);
    }

    public function testCreateWithArray()
    {
        $meteoriteA = Meteorite::create(Coordinates::create(Position::create(5), Position::create(6)));
        $meteoriteB = Meteorite::create(Coordinates::create(Position::create(7), Position::create(8)));
        $arr = [$meteoriteA, $meteoriteB];
        $collection = MeteoriteCollection::create($arr);
        $this->assertEquals($arr, $collection->toArray());
    }
}
