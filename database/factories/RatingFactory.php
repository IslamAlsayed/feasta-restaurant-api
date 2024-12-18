<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = Client::inRandomOrder()->first() ?? Client::factory()->create();
        $recipe = Recipe::inRandomOrder()->first() ?? Recipe::factory()->create();

        return [
            'message' => fake()->sentence(rand(7, 50)),
            'rate' => rand(2, 5),
            'client_id' => $client->id,
            'recipe_id' => $recipe->id,
        ];
    }
}
