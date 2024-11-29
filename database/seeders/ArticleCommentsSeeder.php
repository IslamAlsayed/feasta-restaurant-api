<?php

namespace Database\Seeders;

use App\Models\ArticleComments;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ArticleCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ArticleComments::truncate();
        Schema::enableForeignKeyConstraints();

        ArticleComments::factory(50)->create();
    }
}
