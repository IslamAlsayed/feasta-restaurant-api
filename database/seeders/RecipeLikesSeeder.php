<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\RecipeLikes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RecipeLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        RecipeLikes::truncate();
        Schema::enableForeignKeyConstraints();

        RecipeLikes::factory(Client::pluck('id')->count())->create();
    }
}
