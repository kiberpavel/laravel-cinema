<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuteticationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $userData = [
            "name" => "John",
            "email" => "doe6@example.com",
            "password" => "demo12345"
        ];

        $this->json(
            'POST',
            'api/registration',
            $userData,
            ['Accept' => 'application/json']
        )
            ->assertStatus(202)
            ->assertJsonStructure([
                'meta' => [
                    "token"
                ],
                "user" => [
                    "name",
                    "email",
                    "updated_at",
                    "created_at",
                    "id"
                ],
            ]);
    }

    public function test_access()
    {
        $response = $this->get('/api/films');

        $response->assertRedirect('/api/forbidden');
    }

    public function test_auth()
    {
        $userData = [
            "email" => "doe4@example.com",
            "password" => "demo12345"
        ];

        $this->json(
            'GET',
            'api/login',
            $userData,
            ['Accept' => 'application/json']
        )
            ->assertStatus(200)
            ->assertJsonStructure([
                'meta' => [
                    "token"
                ],
                "user" => [
                    "name",
                    "email",
                    "updated_at",
                    "created_at",
                    "id"
                ],
            ]);
    }
}
