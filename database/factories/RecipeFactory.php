<?php

namespace Database\Factories;

use App\Models\Chef;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $numbers = [];

    public function definition(): array
    {
        $titles = [
            'CLass Margherita Pizza',
            'Vegetarian Stir-Fry',
            'Chocolate Chip Cookies',
            'Chicken Alfredo Pasta',
            'Mango Salsa Chicken',
            'Quinoa Salad with Avocado',
            'Tomato Basil Bruschetta',
            'Beef and Broccoli Stir-Fry',
            'Capers Salad',
            'Shrimp Scampi Pasta',
            'Chicken Biryani',
            'Chicken Karachi',
            'Aldo Kemp',
            'Chaplin Kebabs',
            'Saga with Lakki',
            'Japanese Ramen Soup',
            'Moroccan Chickpea Taine',
            'Korean Bitmap',
            'Greek Moussaka',
            'Butter Chicken (Marg Mani)',
            'Thai Green Curry',
            'Mango Lass',
            'Italian Tiramisu',
            'Turkish Kebabs',
            'Blueberry Banana Smoothie',
            'Mexican Street Corn (Elate)',
            'Russian Borscht',
            'South Indian Masada Doha',
            'Lebanese Falafel Wrap',
            'Brazilian Caipirinha',
        ];

        if (empty(self::$numbers)) {
            self::$numbers = range(1, 14);
            shuffle(self::$numbers);
        }
        $uniqueNumber = array_pop(self::$numbers);
        $price = fake()->randomFloat(2, 0.5, 199.99);
        $date = new DateTime();

        return [
            'title' => $titles[$uniqueNumber],
            'price' => fake()->randomFloat(2, 0.5, 199.99),
            'rating' => rand(1, 5),
            'cooking' => fake()->randomElement(['Italian', 'Asian', 'American', 'Mexican', 'Mediterranean', 'Pakistani', 'Japanese', 'Moroccan', 'Korean', 'Indian', 'Greek', 'Thai', 'Turkish', 'Smoothie', 'Russian', 'Lebanese', 'Brazilian']),
            'mealType' => fake()->randomElement(['breakfast', 'lunch', 'dinner', 'dessert']),
            'vat' => rand(10, 25),
            'item_code' => '#' . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT),
            'offer_price' => $price - ($price / 3),
            'offer_end_at' => $date->modify('+' . rand(1, 7) . ' days')->format('Y-m-d'),
            'description' => fake()->sentence(rand(3, 9)),
            'image' => fake()->unique()->numberBetween(1, 29) . '.webp',
            'chef_id' => Chef::inRandomOrder()->first()->id,
        ];
    }
}
