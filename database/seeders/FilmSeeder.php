<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            Film::updateOrCreate(
                [
                    'name' => Str::random(5),
                    'year_of_issue' => 1995,
                    'about' => Str::random(10),
                    'rating' => 9,
                    'trailer_url' => Str::random(5),
                    'min_age' => 13,
                    'producer_id' => 1,
                ]
            );
        }
    }
}
