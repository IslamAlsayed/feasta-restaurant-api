<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $recipe1 = Recipe::inRandomOrder()->first() ?? Recipe::factory()->create();
        $recipe2 = Recipe::inRandomOrder()->first() ?? Recipe::factory()->create();
        $recipe3 = Recipe::inRandomOrder()->first() ?? Recipe::factory()->create();

        $items = [
            ['id' => $recipe1->id, 'title' => $recipe1->title, 'image' => '15.webp', 'price' => $recipe1->price, 'quantity' => 1, 'vat' => $recipe1->vat],
            ['id' => $recipe2->id, 'title' => $recipe2->title, 'image' => '7.webp', 'price' => $recipe2->price, 'quantity' => 1, 'vat' => $recipe2->vat],
            ['id' => $recipe3->id, 'title' => $recipe3->title, 'image' => '22.webp', 'price' => $recipe3->price, 'quantity' => 1, 'vat' => $recipe3->vat]
        ];

        $total = 0;

        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'] + ($item['price'] * $item['quantity'] * $item['vat'] / 100);
        }

        $client = Client::find(1);

        return [
            'items' => json_encode($items),
            'total' => $total,
            'discount' => fake()->randomElement([0, 5, 10, 15, 20]),
            'client' => '{}',
            'address' => '{}',
            'wayEat' => 'pick-up',
            'wayPay' => 'cash',
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            'client_id' => $client->id,
        ];
    }
}