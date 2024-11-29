<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Rating::truncate();
        Schema::enableForeignKeyConstraints();

        Rating::factory(50)->create();
    }
}
