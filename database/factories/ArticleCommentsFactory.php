<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class ArticleCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = Client::inRandomOrder()->first() ?? Client::factory()->create();
        $article = Article::inRandomOrder()->first() ?? Article::factory()->create();

        return [
            'comment' => fake()->sentence(rand(7, 50)),
            'reacts' => rand(0, 4686),
            'client_id' => $client->id,
            'article_id' => $article->id,
        ];
    }
}
