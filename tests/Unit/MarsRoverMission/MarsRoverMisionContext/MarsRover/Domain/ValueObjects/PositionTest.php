<?php

namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\Position;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\OutOfRangeException;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    public function testCreateReturnsInstanceAndValue()
    {
        $pos = Position::create(42);
        $this->assertInstanceOf(Position::class, $pos);
        $this->assertSame(42, $pos->value());
    }

    public function testEquals()
    {
        $posA = Position::create(15);
        $posB = Position::create(15);
        $posC = Position::create(16);
        $this->assertTrue($posA->equals($posB));
        $this->assertFalse($posA->equals($posC));
    }

    public function testThrowsNotIntException()
    {
        // With strict typing, PHP throws TypeError before custom exception
        $this->expectException(\TypeError::class);
        Position::create('bad');
    }

    public function testThrowsOutOfRangeExceptionForNegative()
    {
        $this->expectException(OutOfRangeException::class);
        Position::create(-1);
    }

    public function testThrowsOutOfRangeExceptionForTooLarge()
    {
        $this->expectException(OutOfRangeException::class);
        Position::create(201);
    }
}
