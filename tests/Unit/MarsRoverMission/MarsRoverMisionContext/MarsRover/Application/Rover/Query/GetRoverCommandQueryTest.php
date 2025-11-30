<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Rover\Query\GetRoverCommandQuery;
use PHPUnit\Framework\TestCase;

class GetRoverCommandQueryTest extends TestCase
{
    public function testCreateAndGetRoverUuid()
    {
        $query = GetRoverCommandQuery::create('uuid-88');
        $this->assertInstanceOf(GetRoverCommandQuery::class, $query);
        $this->assertEquals('uuid-88', $query->getRoverUuid());
    }
}
