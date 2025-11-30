<?php
namespace Tests\Unit\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Service;

use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Service\CreateMeteoriteService;
use MarsRoverMission\MarsRoverMission\MarsRoverMisionContext\MarsRover\Domain\Meteorite\Entity\Meteorite;
use PHPUnit\Framework\TestCase;

class CreateMeteoriteServiceTest extends TestCase
{
    public function testExecuteReturnsMeteoriteWithValidCoordinates()
    {
        $service = new CreateMeteoriteService();
        $meteorite = $service->execute();
        $this->assertInstanceOf(Meteorite::class, $meteorite);
        $pos = $meteorite->getPosition();
        $this->assertGreaterThanOrEqual(0, $pos->getX()->value());
        $this->assertLessThanOrEqual(200, $pos->getX()->value());
        $this->assertGreaterThanOrEqual(0, $pos->getY()->value());
        $this->assertLessThanOrEqual(200, $pos->getY()->value());
    }

    public function testExecuteReturnsNewObjectsEachCall()
    {
        $service = new CreateMeteoriteService();
        $m1 = $service->execute();
        $m2 = $service->execute();
        $this->assertNotSame($m1, $m2);
    }
}
