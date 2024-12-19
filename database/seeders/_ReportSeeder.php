<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Report::truncate();
        Schema::enableForeignKeyConstraints();

        Report::factory(14)->create();
    }
}
