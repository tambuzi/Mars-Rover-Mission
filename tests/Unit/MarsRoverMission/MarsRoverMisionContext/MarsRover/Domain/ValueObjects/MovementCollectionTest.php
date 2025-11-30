<?php

namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movement;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\MovementCollection;
use PHPUnit\Framework\TestCase;

class MovementCollectionTest extends TestCase
{
    public function testCreateAndGetMovements()
    {
        $m1 = Movement::create('F');
        $m2 = Movement::create('L');
        $collection = MovementCollection::create([$m1, $m2]);
        $this->assertSame([$m1, $m2], $collection->getMovements());
    }

    public function testEmptyCollection()
    {
        $collection = MovementCollection::emptyCollection();
        $this->assertIsArray($collection->getMovements());
        $this->assertCount(0, $collection->getMovements());
    }

    public function testAddMovement()
    {
        $m = Movement::create('R');
        $collection = MovementCollection::emptyCollection();
        $collection->addMovement($m);
        $this->assertCount(1, $collection->getMovements());
        $this->assertSame($m, $collection->getMovements()[0]);
    }
}
