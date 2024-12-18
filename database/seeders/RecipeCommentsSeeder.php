<?php

namespace Database\Seeders;

use App\Models\RecipeComments;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RecipeCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        RecipeComments::truncate();
        Schema::enableForeignKeyConstraints();

        RecipeComments::factory(50)->create();
    }
}
