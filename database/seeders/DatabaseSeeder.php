<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            StockSeeder::class,
            ClientSeeder::class,
            ReportSeeder::class,
            ChefSeeder::class,
            RecipeSeeder::class,
            RecipeCommentsSeeder::class,
            RatingSeeder::class,
            ArticleSeeder::class,
            ArticleCommentsSeeder::class,
            OfferSeeder::class,
            TableSeeder::class,
        ]);
    }
}
