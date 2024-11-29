<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = fake()->dateTimeThisYear();
        $end_date = (clone $start_date)->modify('+' . rand(7, 180) . ' days');

        $buying_price = fake()->randomFloat(2, 0.5, 99.99);
        $selling_price = $buying_price + 2;

        return [
            'name' => 'Classic Margherita Pizza',
            'amount' => 70,
            'type' => 'food',
            'category' => 'vegetable',
            'title' => 'carrot',
            'start_date' => $start_date->format('Y-m-d H:i:s'),
            'end_date' => $end_date->format('Y-m-d H:i:s'),
            'buying_price' => $buying_price,
            'selling_price' => $selling_price,
            'vat' => rand(1, 25),
            'cookTime' => rand(1, 45),
            'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
            'cooking' => fake()->randomElement(['Italian', 'Asian', 'American', 'Mexican', 'Mediterranean', 'Pakistani', 'Japanese', 'Moroccan', 'Korean', 'Indian', 'Greek', 'Thai', 'Turkish', 'Smoothie', 'Russian', 'Lebanese', 'Brazilian']),
            'calories' => rand(1, 200),
            'mealType' => fake()->randomElement(['breakfast', 'lunch', 'dinner', 'dessert']),
            'ingredients' => json_encode([
                'Pizza dough',
                'Tomato sauce',
                'Fresh mozzarella cheese',
                'Fresh basil leaves',
                'Olive oil',
                'Salt and pepper to taste'
            ]),
            'image' => 'recipes/' . rand(1, 29) . '.webp',
            'description' => fake()->sentence(rand(7, 50)),
            'deleted_at' => NULL,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
