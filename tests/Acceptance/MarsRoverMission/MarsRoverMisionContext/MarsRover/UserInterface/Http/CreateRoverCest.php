<?php

namespace Tests\acceptance\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Codeception\Util\JsonType;
use Tests\AcceptanceTester;

class CreateRoverCest
{
    public function testCreateRoverSuccessfully(AcceptanceTester $I)
    {
        $I->sendPOST('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();

        $response = json_decode($I->grabResponse(), true);
        $I->assertNotEmpty($response['uuid']);
    }

    public function testCreateRoverWithInvalidDirection(AcceptanceTester $I)
    {
        $I->sendPOST('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'INVALID'
        ]);

        $I->seeResponseCodeIs(500);
    }

    public function testCreateRoverWithOutOfRangeCoordinates(AcceptanceTester $I)
    {
        $I->sendPOST('/api/v1/rover', [
            'startingPointX' => 250,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $I->seeResponseCodeIs(500);
    }

    public function testCreateRoverWithMissingParameters(AcceptanceTester $I)
    {
        $I->sendPOST('/api/v1/rover', [
            'startingPointX' => 5,
        ]);

        $I->seeResponseCodeIs(400);
    }

    public function testCreateRoverWithAllDirections(AcceptanceTester $I)
    {
        $directions = ['N', 'E', 'S', 'O'];

        foreach ($directions as $direction) {
            $I->sendPOST('/api/v1/rover', [
                'startingPointX' => 5,
                'startingPointY' => 10,
                'direction' => $direction
            ]);

            $I->seeResponseCodeIs(201);
            $I->seeResponseIsJson();
        }
    }
}

