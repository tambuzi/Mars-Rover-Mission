<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Application\Meteorite\Query\GetMeteoritesCommandQuery;
use PHPUnit\Framework\TestCase;

class GetMeteoritesCommandQueryTest extends TestCase
{
    public function testStaticCreateReturnsInstance()
    {
        $cmd = GetMeteoritesCommandQuery::create();
        $this->assertInstanceOf(GetMeteoritesCommandQuery::class, $cmd);
    }
}
