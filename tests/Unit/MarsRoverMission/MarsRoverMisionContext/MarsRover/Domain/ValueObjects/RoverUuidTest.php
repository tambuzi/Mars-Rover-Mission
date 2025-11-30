<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\ValueObjects\RoverUuid;
use PHPUnit\Framework\TestCase;

class RoverUuidTest extends TestCase
{
    public function testGenerateReturnsValidUuid()
    {
        $uuid = RoverUuid::generate();
        $this->assertInstanceOf(RoverUuid::class, $uuid);
        $this->assertIsString($uuid->toString());
        $this->assertTrue(strlen($uuid->toString()) > 0);
    }

    public function testFromStringCreatesSameValue()
    {
        $generated = RoverUuid::generate();
        $string = $generated->toString();
        $fromString = RoverUuid::fromString($string);
        $this->assertEquals($string, $fromString->toString());
    }
}
