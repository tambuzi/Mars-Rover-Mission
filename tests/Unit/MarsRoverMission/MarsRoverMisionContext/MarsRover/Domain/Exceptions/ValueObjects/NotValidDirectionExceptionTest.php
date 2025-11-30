<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Exceptions\ValueObjects\NotValidDirectionException;
use PHPUnit\Framework\TestCase;

class NotValidDirectionExceptionTest extends TestCase
{
    public function testExceptionThrown()
    {
        $this->expectException(NotValidDirectionException::class);
        throw new NotValidDirectionException('Not a valid direction');
    }

    public function testMessageSet()
    {
        $exc = new NotValidDirectionException('Not a valid direction');
        $this->assertSame('Not a valid direction', $exc->getMessage());
    }
}
