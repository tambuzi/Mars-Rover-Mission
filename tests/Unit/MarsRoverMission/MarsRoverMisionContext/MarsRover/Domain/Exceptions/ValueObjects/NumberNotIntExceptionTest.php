<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NumberNotIntException;
use PHPUnit\Framework\TestCase;

class NumberNotIntExceptionTest extends TestCase
{
    public function testExceptionInstanceCanBeThrown()
    {
        $this->expectException(NumberNotIntException::class);
        throw new NumberNotIntException();
    }

    public function testHasMessage()
    {
        $e = new NumberNotIntException();
        $this->assertSame('Number is not int.', $e->getMessage());
    }
}
