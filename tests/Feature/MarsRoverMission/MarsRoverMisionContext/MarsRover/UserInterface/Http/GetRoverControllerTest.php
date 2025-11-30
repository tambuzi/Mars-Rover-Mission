<?php

namespace Tests\Feature\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetRoverControllerTest extends TestCase
{
    public function testGetRoverSuccessfully()
    {
        // First create a rover
        $createResponse = $this->postJson('/api/v1/rover', [
            'startingPointX' => 5,
            'startingPointY' => 10,
            'direction' => 'N'
        ]);

        $createResponse->assertStatus(201);
        $uuid = $createResponse->json('uuid');

        // Then get the rover
        $response = $this->getJson("/api/v1/rover?uuid={$uuid}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'uuid',
                'position' => [
                    'x',
                    'y'
                ],
                'direction'
            ])
            ->assertJson([
                'uuid' => $uuid,
                'position' => [
                    'x' => 5,
                    'y' => 10
                ],
                'direction' => 'N'
            ]);
    }

    public function testGetRoverWithInvalidUuid()
    {
        $response = $this->getJson('/api/v1/rover?uuid=invalid-uuid-123');

        $response->assertStatus(500);
    }

    public function testGetRoverWithNonExistentUuid()
    {
        $nonExistentUuid = '00000000-0000-0000-0000-000000000000';
        $response = $this->getJson("/api/v1/rover?uuid={$nonExistentUuid}");

        $response->assertStatus(500);
    }

    public function testGetRoverWithoutUuidParameter()
    {
        $response = $this->getJson('/api/v1/rover');

        $response->assertStatus(500);
    }
}

