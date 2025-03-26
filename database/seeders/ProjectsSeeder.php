<?php

namespace Database\Seeders;

use App\Models\Project as Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {

            $newProject = new Project();

            $newProject->name = $faker->name;
            $newProject->slug = $faker->slug;
            $newProject->customer = $faker->name;
            $newProject->description = $faker->text;
            $newProject->image = $faker->imageUrl;

            $newProject->save();
        }
    }
}
