<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Movements;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MovementsTest extends TestCase
{
    public function testFromReturnsCorrectCase()
    {
        $this->assertEquals(Movements::F, Movements::from('F'));
        $this->assertEquals(Movements::L, Movements::from('L'));
    }

    public function testFromThrowsForInvalidValue()
    {
        $this->expectException(InvalidArgumentException::class);
        Movements::from('X');
    }

    public function testValid()
    {
        $this->assertTrue(Movements::valid('F'));
        $this->assertFalse(Movements::valid('Z'));
    }

    public function testEquals()
    {
        $this->assertTrue(Movements::F->equals(Movements::F));
        $this->assertFalse(Movements::F->equals(Movements::L));
    }

    public function testHandlerMethod()
    {
        $this->assertEquals('moveForward', Movements::F->handlerMethod());
        $this->assertEquals('turnLeft', Movements::L->handlerMethod());
        $this->assertEquals('turnRight', Movements::R->handlerMethod());
        $this->assertEquals('moveBackward', Movements::B->handlerMethod());
    }
}
