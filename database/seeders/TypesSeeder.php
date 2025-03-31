<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['web', 'mobile', 'desktop', 'design', 'other'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->description = $faker->sentence;

            $newType->save();
        }
    }
}
