<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $numbers = [];

    public function definition(): array
    {
        if (empty(self::$numbers)) {
            self::$numbers = range(1, 14);
            shuffle(self::$numbers);
        }

        $uniqueNumber = array_pop(self::$numbers);

        return [
            'title' => 'best chocolate cake',
            'type' => json_encode(fake()->randomElement([['dishes'], ['dishes', 'seasonal', 'sweet'], ['dishes', 'seasonal'], ['dishes', 'sweet']])),
            'comments' => rand(0, 120),
            'likes' => rand(0, 120),
            'description' => fake()->sentence(rand(14, 50)),
            'image' => $uniqueNumber . '.jpg',
        ];
    }
}
