<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotStringException;
use PHPUnit\Framework\TestCase;

class NotStringExceptionTest extends TestCase
{
    public function testExceptionInstanceCanBeThrown()
    {
        $this->expectException(NotStringException::class);
        throw new NotStringException();
    }

    public function testHasMessage()
    {
        $e = new NotStringException();
        $this->assertSame('Input not a string', $e->getMessage());
    }
}
