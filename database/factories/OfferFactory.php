<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = fake()->dateTimeThisYear();
        $end_date = (clone $start_date)->modify('+' . rand(1, 3) . ' days');

        $menu = Menu::inRandomOrder()->first() ?? Menu::factory()->create();

        return [
            'discount' => rand(30, 100),
            'description' => fake()->sentence(rand(7, 14)),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'menu_id' => $menu,
        ];
    }
}
