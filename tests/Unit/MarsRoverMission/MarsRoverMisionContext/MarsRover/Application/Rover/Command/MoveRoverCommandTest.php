<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Command\MoveRoverCommand;
use PHPUnit\Framework\TestCase;

class MoveRoverCommandTest extends TestCase
{
    public function testCreateAndGetters()
    {
        $cmd = MoveRoverCommand::create('some-uuid', 'FLBR');
        $this->assertInstanceOf(MoveRoverCommand::class, $cmd);
        $this->assertEquals('some-uuid', $cmd->getRoverUuid());
        $this->assertEquals(['F','L','B','R'], $cmd->getMove());
    }
    public function testToArray()
    {
        $cmd = MoveRoverCommand::create('uuid-123','FLBR');
        $arr = $cmd->toArray();
        $this->assertEquals(['uuid'=>'uuid-123','move'=>'FLBR'],$arr);
    }
}
