<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\CreateRoverCommand;
use PHPUnit\Framework\TestCase;

class CreateRoverCommandTest extends TestCase
{
    public function testStaticCreateAndGetters()
    {
        $cmd = CreateRoverCommand::create(3, 5, 'N');
        $this->assertInstanceOf(CreateRoverCommand::class, $cmd);
        $this->assertEquals(3, $cmd->getStartingPointX());
        $this->assertEquals(5, $cmd->getStartingPointY());
        $this->assertEquals('N', $cmd->getDirection());
    }
}
