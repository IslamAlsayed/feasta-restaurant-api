<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class MenuCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $client = Client::inRandomOrder()->first() ?? Client::factory()->create();
        $menu = Menu::inRandomOrder()->first() ?? Menu::factory()->create();

        return [
            'name' => fake()->name(),
            'comment' => fake()->sentence(rand(7, 14)),
            'rate' => fake()->randomElement(['1', '2', '3', '4', '5']),
            'client_id' => $client,
            'menu_id' => $menu,
        ];
    }
}