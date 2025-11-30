<?php

namespace Tests\acceptance\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\AcceptanceTester;

class CreateCanvasMeteoritesCest
{
    public function testCreateCanvasMeteoritesSuccessfully(AcceptanceTester $I)
    {
        $I->sendPOST('/api/v1/canvas/meteorites');

        $I->seeResponseCodeIs(201);
    }

    public function testCreateCanvasMeteoritesMultipleTimes(AcceptanceTester $I)
    {
        // Create meteorites first time
        $I->sendPOST('/api/v1/canvas/meteorites');
        $I->seeResponseCodeIs(201);

        // Create meteorites second time (should replace or add more)
        $I->sendPOST('/api/v1/canvas/meteorites');
        $I->seeResponseCodeIs(201);
    }
}

