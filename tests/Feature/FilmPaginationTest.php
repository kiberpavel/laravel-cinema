<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FilmPaginationTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pagination(): void
    {
        $response = $this->get('api/films?page=1');

        $response->assertJsonFragment([
            'perPage' => 10,
            'lastPage' => 5,
            'totalCount' => 50,]);
    }

    public function test_negative_page(): void
    {
        $response = $this->get('api/films?page=13');
        $response->assertStatus(404);
    }

    public function test_assert(): void
    {
        $response = $this->get('api/films?page=1');
        $response
            ->assertJson(
                fn (AssertableJson $json) => $json
                ->has('meta')
                ->has(
                    'data',
                    10,
                    fn ($json) => $json->where('id', 1)
                    ->where('rating', 9)
                    ->where('year_of_issue', '1995')
                    ->where('min_age', 13)
                    ->where('producer_id', 1)
                    ->etc()
                )
            );
        $response->assertStatus(200);
    }
}
