<?php

namespace Database\Seeders;

use App\Models\Project as Project;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {

            $newProject = new Project();

            $newProject->name = $faker->words(3, true);
            $newProject->customer = $faker->name;
            $newProject->description = $faker->text;
            $newProject->image = null;
            $newProject->type_id = rand(1, 5);

            // ? aggiunta delle tecnologie al seeder in maniera casuale

            $slug = Str::of("ntn rss {$newProject->name}")->slug('-');

            $newProject->slug = $slug;

            $newProject->save();
        }
    }
}
