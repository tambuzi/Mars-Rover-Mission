<?php

namespace Tests\acceptance\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\AcceptanceTester;

class GetRoverCest
{
    public function testGetRoverSuccessfully(AcceptanceTester $I)
    {
        // First create a rover
        $I->sendPOST('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $I->seeResponseCodeIs(201);
        $response = json_decode($I->grabResponse(), true);
        $uuid = $response['uuid'];

        // Then get the rover
        $I->sendGET('/api/v1/rover', ['uuid' => $uuid]);

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'uuid' => $uuid,
            'position' => [
                'x' => 5,
                'y' => 10
            ],
            'direction' => 'N'
        ]);
    }

    public function testGetRoverWithInvalidUuid(AcceptanceTester $I)
    {
        $I->sendGET('/api/v1/rover', ['uuid' => 'invalid-uuid-123']);

        $I->seeResponseCodeIs(400);
    }

    public function testGetRoverWithNonExistentUuid(AcceptanceTester $I)
    {
        $nonExistentUuid = '00000000-0000-0000-0000-000000000000';
        $I->sendGET('/api/v1/rover', ['uuid' => $nonExistentUuid]);

        $I->seeResponseCodeIs(404);
    }

    public function testGetRoverWithoutUuidParameter(AcceptanceTester $I)
    {
        $I->sendGET('/api/v1/rover');

        $I->seeResponseCodeIs(400);
    }
}

