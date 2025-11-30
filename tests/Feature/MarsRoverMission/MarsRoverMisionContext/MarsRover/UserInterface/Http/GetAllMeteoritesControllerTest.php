<?php

namespace Tests\Feature\MarsRoverMission\MarsRoverMisionContext\MarsRover\UserInterface\Http;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetAllMeteoritesControllerTest extends TestCase
{
    public function testGetAllMeteoritesWhenEmpty()
    {
        $response = $this->getJson('/api/v1/canvas/meteorites');

        $response->assertStatus(200)
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

    public function testGetAllMeteoritesAfterCreation()
    {
        // Create meteorites first
        $createResponse = $this->postJson('/api/v1/canvas/meteorites');
        $createResponse->assertStatus(201);

        // Get all meteorites
        $response = $this->getJson('/api/v1/canvas/meteorites');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'key',
                    'position' => [
                        'x',
                        'y'
                    ]
                ]
            ]);

        // Verify meteorites have valid positions
        $meteorites = $response->json();
        $this->assertIsArray($meteorites);
        
        if (count($meteorites) > 0) {
            foreach ($meteorites as $meteorite) {
                $this->assertArrayHasKey('key', $meteorite);
                $this->assertArrayHasKey('position', $meteorite);
                $this->assertArrayHasKey('x', $meteorite['position']);
                $this->assertArrayHasKey('y', $meteorite['position']);
                $this->assertGreaterThanOrEqual(0, $meteorite['position']['x']);
                $this->assertLessThanOrEqual(200, $meteorite['position']['x']);
                $this->assertGreaterThanOrEqual(0, $meteorite['position']['y']);
                $this->assertLessThanOrEqual(200, $meteorite['position']['y']);
            }
        }
    }
}

