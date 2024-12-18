<?php

namespace Database\Seeders;

use App\Models\ArticleLikes;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ArticleLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ArticleLikes::truncate();
        Schema::enableForeignKeyConstraints();

        ArticleLikes::factory(Client::pluck('id')->count())->create();
    }
}
