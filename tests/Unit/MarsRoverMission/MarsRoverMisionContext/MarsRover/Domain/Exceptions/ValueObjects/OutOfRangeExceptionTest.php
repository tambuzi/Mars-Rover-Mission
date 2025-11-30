<?php

namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\OutOfRangeException;
use PHPUnit\Framework\TestCase;

class OutOfRangeExceptionTest extends TestCase
{
    public function testExceptionThrown()
    {
        $this->expectException(OutOfRangeException::class);
        throw new OutOfRangeException();
    }

    public function testHasMessage()
    {
        $e = new OutOfRangeException();
        $this->assertSame('Position Out Of Range.', $e->getMessage());
    }
}
