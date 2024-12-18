<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class RecipeCommentsFactory extends Factory
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
            'comment' => fake()->sentence(rand(7, 14)),
            'rate' => fake()->randomElement(['1', '2', '3', '4', '5']),
            'client_id' => $client->id,
            'recipe_id' => $recipe->id,
        ];
    }
}
