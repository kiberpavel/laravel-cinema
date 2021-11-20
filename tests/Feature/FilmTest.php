<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class FilmTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_film(): void
    {
        $payload = [
            'name' => 'Spider6',
            'year_of_issue' => '2019',
            'about' => 'Best film in the planet',
            'trailer_url' => 'muurl1234',
            'min_age' => 16,
            'producer_id' => 1,
            'rating' => 1,
        ];

        $resp = $this->json('post', '/api/film', $payload)->
        assertStatus(Response::HTTP_CREATED);

    }//end test_film()


    public function test_error(): void
    {
        $response = $this->postJson('api/film')->
        assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

    }//end test_error()


}//end class
