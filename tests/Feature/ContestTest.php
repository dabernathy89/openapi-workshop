<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Integration\ValidatesWithOpenApi;
use Tests\TestCase;

class ContestTest extends TestCase
{
    use DatabaseTransactions;

    use ValidatesWithOpenApi;

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

        [$success, $message] = $this->validateWithOpenApi(
            '/contests',
            'POST',
            $response
        );

        $this->assertTrue($success, $message);
    }

    public function testContestNameMustBeString()
    {
        $user = \App\User::first();

        $body = [
            'name' => 123,
        ];

        $response = $this->actingAs($user)
            ->postJson('/contests', $body)
            ->assertStatus(400);

        $this->assertDatabaseMissing(
            'contests',
            ['name' => $body['name']]
        );

        [$success, $message] = $this->validateWithOpenApi(
            '/contests',
            'POST',
            $response
        );

        $this->assertTrue($success, $message);
    }
}
