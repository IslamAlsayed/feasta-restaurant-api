<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Chef::truncate();
        Schema::enableForeignKeyConstraints();

        Chef::factory(5)->create();
    }
}
