<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class ArticleLikesFactory extends Factory
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
            self::$numbers = range(1, Client::pluck('id')->count());
            shuffle(self::$numbers);
        }

        $uniqueClientId = array_pop(self::$numbers);
        $article = Article::inRandomOrder()->first() ?? Article::factory()->create();

        return [
            'client_id' => $uniqueClientId,
            'article_id' => $article->id,
        ];
    }
}
