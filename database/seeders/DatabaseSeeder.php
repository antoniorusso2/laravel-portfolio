<?php

namespace Database\Seeders;

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
                TypesSeeder::class,
                TechnologiesSeeder::class,
                ProjectsSeeder::class,
                MediaSeeder::class
            ]
        );
    }
}
