<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = Client::inRandomOrder()->first() ?? Client::factory()->create();

        return [
            'content' => fake()->sentence(rand(7, 140)),
            'reminder' => fake()->randomElement(['true', 'false']),
            'favorite' => fake()->randomElement(['true', 'false']),
            'client_id' => $client->id,
        ];
    }
}
