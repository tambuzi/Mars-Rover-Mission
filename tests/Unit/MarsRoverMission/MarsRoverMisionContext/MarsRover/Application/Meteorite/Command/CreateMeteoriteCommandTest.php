<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Command\CreateMeteoriteCommand;
use PHPUnit\Framework\TestCase;

class CreateMeteoriteCommandTest extends TestCase
{
    public function testStaticCreateReturnsInstance()
    {
        $cmd = CreateMeteoriteCommand::create();
        $this->assertInstanceOf(CreateMeteoriteCommand::class, $cmd);
    }
}
