<?php

namespace Tests\Feature\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoverIntegrationTest extends TestCase
{
    public function testCompleteRoverWorkflow()
    {
        // Step 1: Create canvas with meteorites
        $meteoritesResponse = $this->postJson('/api/v1/canvas/meteorites');
        $meteoritesResponse->assertStatus(201);

        // Step 2: Create a rover
        $createRoverResponse = $this->postJson('/api/v1/rover', [
            'startingPointX' => 10,
            'startingPointY' => 20,
            'direction' => 'N'
        ]);

        $createRoverResponse->assertStatus(201);
        $uuid = $createRoverResponse->json('uuid');
        $this->assertNotEmpty($uuid);

        // Step 3: Get the rover to verify it was created correctly
        $getRoverResponse = $this->getJson("/api/v1/rover?uuid={$uuid}");
        $getRoverResponse->assertStatus(200)
            ->assertJson([
                'uuid' => $uuid,
                'position' => [
                    'x' => 10,
                    'y' => 20
                ],
                'direction' => 'N'
            ]);

        // Step 4: Move the rover
        $moveResponse = $this->postJson('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'F'
        ]);
        $moveResponse->assertStatus(200);

        // Step 5: Get the rover again to verify it moved
        $getRoverAfterMoveResponse = $this->getJson("/api/v1/rover?uuid={$uuid}");
        $getRoverAfterMoveResponse->assertStatus(200)
            ->assertJson([
                'uuid' => $uuid,
                'position' => [
                    'x' => 10,
                    'y' => 21  // Moved forward in North direction
                ],
                'direction' => 'N'
            ]);

        // Step 6: Get all meteorites
        $getMeteoritesResponse = $this->getJson('/api/v1/canvas/meteorites');
        $getMeteoritesResponse->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'key',
                    'position' => [
                        'x',
                        'y'
                    ]
                ]
            ]);
    }

    public function testRoverMovementWithRotation()
    {
        // Create a rover
        $createRoverResponse = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 5,
            'direction' => 'N'
        ]);

        $createRoverResponse->assertStatus(201);
        $uuid = $createRoverResponse->json('uuid');

        // Move and rotate: Forward, Left, Forward
        $moveResponse = $this->postJson('/api/v1/rover/move', [
            'uuid' => $uuid,
            'movements' => 'FLF'
        ]);
        $moveResponse->assertStatus(200);

        // Verify final position and direction
        $getRoverResponse = $this->getJson("/api/v1/rover?uuid={$uuid}");
        $getRoverResponse->assertStatus(200);
        
        $roverData = $getRoverResponse->json();
        $this->assertEquals($uuid, $roverData['uuid']);
        // After FLF: F (move N), L (turn to O/West), F (move West)
        // So position should be (4, 6) and direction should be 'O'
        $this->assertEquals('O', $roverData['direction']);
    }
}

