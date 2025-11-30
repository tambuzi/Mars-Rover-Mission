<?php

namespace Tests\acceptance\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\AcceptanceTester;

class MoveRoverCest
{
    public function testMoveRoverSuccessfully(AcceptanceTester $I)
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

        // Move the rover
        $I->sendPOST('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'F'
        ]);

        $I->seeResponseCodeIs(200);
    }

    public function testMoveRoverWithMultipleMovements(AcceptanceTester $I)
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

        // Move the rover with multiple movements
        $I->sendPOST('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'FLR'
        ]);

        $I->seeResponseCodeIs(200);
    }

    public function testMoveRoverWithMissingParameters(AcceptanceTester $I)
    {
        $I->sendPOST('/api/v1/rover/move', [
            'uuid' => 'some-uuid'
        ]);

        $I->seeResponseCodeIs(400);
    }

    public function testMoveRoverWithAllMovementTypes(AcceptanceTester $I)
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

        // Test all movement types
        $movements = ['F', 'L', 'R', 'B'];

        foreach ($movements as $movement) {
            $I->sendPOST('/api/v1/rover/move', [
                'uuid' => $uuid,
                'movements' => $movement
            ]);

            $I->seeResponseCodeIs(200);
        }
    }
}

