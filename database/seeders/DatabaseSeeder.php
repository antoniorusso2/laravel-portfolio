<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class,
                TypesSeeder::class,
                TechnologiesSeeder::class,
                ProjectsSeeder::class,
                MediaSeeder::class
            ]
        );
    }
}
