<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Shared\Application\Command\Command;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testCanCreateMock()
    {
        $mock = $this->getMockForAbstractClass(Command::class);
        $this->assertInstanceOf(Command::class, $mock);
    }
}
