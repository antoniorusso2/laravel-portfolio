<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP',
            'Laravel',
            'Bootstrap',
            'Tailwind',
            'Vue',
            'React',
            'Node.js',
            'Express.js',
            'MySQL'
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor;
            $newTechnology->icon_url = $faker->url();

            $newTechnology->save();
        }
    }
}
