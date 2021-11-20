<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Producer;
use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    public function run(): void
    {
        Producer::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'first_name' => 'test2',
                'second_name' => 'test'
            ]
        );
    }
}
