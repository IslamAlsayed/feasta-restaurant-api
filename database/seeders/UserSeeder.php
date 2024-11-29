<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'Admin',
            'phone' => '01065438133',
            'type' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('test123'),
            'status' => 'active'
        ]);

        User::create([
            'name' => 'Guest',
            'phone' => '01065438133',
            'type' => 'guest',
            'email' => 'guest@example.com',
            'password' => Hash::make('test123'),
            'status' => 'active'
        ]);

        User::create([
            'name' => 'IslamAlsayed',
            'phone' => '01065438133',
            'type' => 'admin',
            'email' => 'eslamalsayed8133@gmail.com',
            'password' => Hash::make('test123'),
            'status' => 'inactive'
        ]);
    }
}
