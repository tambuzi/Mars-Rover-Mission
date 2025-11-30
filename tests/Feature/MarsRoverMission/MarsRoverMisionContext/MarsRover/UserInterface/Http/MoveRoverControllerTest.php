<?php

namespace Tests\Feature\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MoveRoverControllerTest extends TestCase
{
    public function testMoveRoverSuccessfully()
    {
        // First create a rover
        $createResponse = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $createResponse->assertStatus(201);
        $uuid = $createResponse->json('uuid');

        // Move the rover
        $response = $this->postJson('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'F'
        ]);

        $response->assertStatus(200);
    }

    public function testMoveRoverWithMultipleMovements()
    {
        // First create a rover
        $createResponse = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $createResponse->assertStatus(201);
        $uuid = $createResponse->json('uuid');

        // Move the rover with multiple movements
        $response = $this->postJson('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'FLR'
        ]);

        $response->assertStatus(200);
    }

    public function testMoveRoverWithInvalidUuid()
    {
        $response = $this->postJson('/api/v1/rover/move', [
            'uuid' => 'invalid-uuid',
            'movements' => 'F'
        ]);

        $response->assertStatus(500);
    }

    public function testMoveRoverWithNonExistentUuid()
    {
        $nonExistentUuid = '00000000-0000-0000-0000-000000000000';
        $response = $this->postJson('/api/v1/rover/move', [
            'uuid' => $nonExistentUuid,
            'movements' => 'F'
        ]);

        $response->assertStatus(500);
    }

    public function testMoveRoverWithInvalidMovements()
    {
        // First create a rover
        $createResponse = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $createResponse->assertStatus(201);
        $uuid = $createResponse->json('uuid');

        // Try to move with invalid movement
        $response = $this->postJson('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'X'
        ]);

        $response->assertStatus(500);
    }

    public function testMoveRoverWithMissingParameters()
    {
        $response = $this->postJson('/api/v1/rover/move', [
            'uuid' => 'some-uuid'
        ]);

        $response->assertStatus(500);
    }
}

