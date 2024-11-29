<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chef>
 */
class ChefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titleJobs = [
            ['Culinary Specialist' => 'Crafting Gastronomic Delights'],
            ['Executive Chef' => 'Mastermind of Exquisite Cuisine'],
            ['Sous Chef' => 'Second-in-Command of Culinary Creations'],
            ['Pastry Chef' => 'Architect of Sweet Confections'],
            ['Line Cook' => 'Expert in Precision Cooking Techniques'],
        ];

        $randomTitleJob = $titleJobs[array_rand($titleJobs)];
        $titleJobKey = key($randomTitleJob);
        $titleJobValue = current($randomTitleJob);

        return [
            'name' => fake()->name,
            'email' => fake()->email,
            'phone' => fake()->e164PhoneNumber(),
            'address' => fake()->address,
            'age' => fake()->numberBetween(21, 45),
            'titleJob' => $titleJobKey,
            'specialty' => 'beef chicken',
            'description' => fake()->sentence(rand(14, 50)),
            'information' => fake()->sentence(rand(14, 50)),
            'about' => $titleJobValue,
            'experience' => json_encode([
                [
                    'title' => 'grill chicken with garlic',
                    'description' => fake()->sentence(rand(7, 14)),
                ],
                [
                    'title' => 'soup with peppers',
                    'description' => fake()->sentence(rand(7, 14)),
                ],
                [
                    'title' => 'lime & mandarin juice',
                    'description' => fake()->sentence(rand(7, 14)),
                ],
                [
                    'title' => 'multivitamin salad',
                    'description' => fake()->sentence(rand(7, 14)),
                ]
            ]),
            'skills' => json_encode([
                [
                    'title' => fake()->name(),
                    'progress' => fake()->numberBetween(34, 95),
                ],
                [
                    'title' => fake()->name(),
                    'progress' => fake()->numberBetween(34, 95),
                ],
                [
                    'title' => fake()->name(),
                    'progress' => fake()->numberBetween(34, 95),
                ],
            ]),
            'favorite_dish' => 'Tandoori Chicken',
            'favorite_dish_image' => rand(1, 30) . '.webp',
            'years_experience' => fake()->numberBetween(3, 7),
            'media' => json_encode([
                [
                    'type' => 'linkedin',
                    'url' => 'https://www.linkedin.com',
                ],
                [
                    'type' => 'facebook',
                    'url' => 'https://www.facebook.com',
                ],
                [
                    'type' => 'twitter',
                    'url' => 'https://www.twitter.com',
                ],
                [
                    'type' => 'google',
                    'url' => 'https://www.google.com',
                ]
            ]),
            'image' => fake()->unique()->numberBetween(1, 5) . '.png',
        ];
    }
}
