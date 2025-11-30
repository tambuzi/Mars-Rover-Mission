<?php

namespace Tests\acceptance\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\AcceptanceTester;

class GetAllMeteoritesCest
{
    public function testGetAllMeteoritesWhenEmpty(AcceptanceTester $I)
    {
        $I->sendGET('/api/v1/canvas/meteorites');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $response = json_decode($I->grabResponse(), true);
        $I->assertIsArray($response);
    }

    public function testGetAllMeteoritesAfterCreation(AcceptanceTester $I)
    {
        // Create meteorites first
        $I->sendPOST('/api/v1/canvas/meteorites');
        $I->seeResponseCodeIs(201);

        // Get all meteorites
        $I->sendGET('/api/v1/canvas/meteorites');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $response = json_decode($I->grabResponse(), true);
        $I->assertIsArray($response);

        // Verify meteorites have valid structure and positions
        if (count($response) > 0) {
            foreach ($response as $meteorite) {
                $I->assertArrayHasKey('key', $meteorite);
                $I->assertArrayHasKey('position', $meteorite);
                $I->assertArrayHasKey('x', $meteorite['position']);
                $I->assertArrayHasKey('y', $meteorite['position']);
                $I->assertGreaterThanOrEqual(0, $meteorite['position']['x']);
                $I->assertLessThanOrEqual(200, $meteorite['position']['x']);
                $I->assertGreaterThanOrEqual(0, $meteorite['position']['y']);
                $I->assertLessThanOrEqual(200, $meteorite['position']['y']);
            }
        }
    }
}

