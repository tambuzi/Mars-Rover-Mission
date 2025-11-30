<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidMovementException;
use PHPUnit\Framework\TestCase;

class NotValidMovementExceptionTest extends TestCase
{
    public function testExceptionThrown()
    {
        $this->expectException(NotValidMovementException::class);
        throw new NotValidMovementException();
    }

    public function testMessageSet()
    {
        $e = new NotValidMovementException();
        $this->assertSame('Not Valid Movement.', $e->getMessage());
    }
}
