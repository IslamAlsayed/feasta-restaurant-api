<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiteSeeder::class,
            UserSeeder::class,
            StockSeeder::class,
            ClientSeeder::class,
            ReservationSeeder::class,
            // ReportSeeder::class,
            ChefSeeder::class,
            RecipeSeeder::class,
            RecipeCommentsSeeder::class,
            RecipeLikesSeeder::class,
            RatingSeeder::class,
            ArticleSeeder::class,
            ArticleCommentsSeeder::class,
            ArticleLikesSeeder::class,
            OfferSeeder::class,
            TableSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
        ]);
    }
}