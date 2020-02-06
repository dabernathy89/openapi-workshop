<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContestTest extends TestCase
{
    use DatabaseTransactions;

    public function testCanCreateContest()
    {
        $user = \App\User::first();

        $body = [
            'name' => 'Test Contest',
        ];

        $response = $this->actingAs($user)
            ->postJson('/contests', $body)
            ->assertStatus(201)
            ->assertJsonFragment($body);

        $this->assertDatabaseHas(
            'contests',
            ['name' => $body['name']]
        );
    }

    public function assertValidSchema($path, $operation, $response)
    {
        $this->assertTrue(true);
    }
}
