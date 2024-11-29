<?php

namespace Database\Seeders;

use App\Models\MenuComments;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MenuCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MenuComments::truncate();
        Schema::enableForeignKeyConstraints();

        MenuComments::factory(50)->create();
    }
}
