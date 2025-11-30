<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Directions;
use PHPUnit\Framework\TestCase;

class DirectionsTest extends TestCase
{
    public function testFromIndexAndIndex()
    {
        $this->assertEquals(Directions::N, Directions::fromIndex(0));
        $this->assertEquals(0, Directions::N->index());
        $this->assertEquals(1, Directions::E->index());
        $this->assertEquals(Directions::S, Directions::fromIndex(2));
        $this->assertEquals(Directions::O, Directions::fromIndex(3));
    }

    public function testVector()
    {
        $this->assertEquals(['x' => 0, 'y' => 1], Directions::N->vector());
        $this->assertEquals(['x' => 1, 'y' => 0], Directions::E->vector());
        $this->assertEquals(['x' => -1, 'y' => 0], Directions::O->vector());
        $this->assertEquals(['x' => 0, 'y' => -1], Directions::S->vector());
    }

    public function testValueMethod()
    {
        $this->assertSame('N', Directions::N->value());
        $this->assertSame('E', Directions::E->value());
        $this->assertSame('O', Directions::O->value());
        $this->assertSame('S', Directions::S->value());
    }
}
