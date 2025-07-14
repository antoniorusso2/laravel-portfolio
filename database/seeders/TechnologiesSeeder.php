<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => "HTML",
                'color' => "#ff6d01",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=20909&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "CSS",
                'color' => "#1377bd",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=21278&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "JavaScript",
                'color' => "#fdd600",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=108784&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "PHP",
                'color' => "#878eb7",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=f0R4xVI4Sc8O&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "Laravel",
                'color' => "#f34e34",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=qfQaIYKX23qY&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "React",
                'color' => "#00acc1",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=asWSSTBrDlTW&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "Node.js",
                'color' => "#4caf50",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=54087&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "Bootstrap",
                'color' => "#7c4dff",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=PndQWK6M1Hjo&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "Tailwind",
                'color' => "#00acc1",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=4PiNHtUJVbLs&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "Express.js",
                'color' => "#4caf50",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=kg46nzoJrmTR&format=png&color=000000',
                'icon' => null,
            ],
            [
                'name' => "MySQL",
                'color' => "#4caf50",
                'icon_external_url' => 'https://img.icons8.com/?size=100&id=9nLaR5KFGjN0&format=png&color=000000/possimus-quod-dolores-sed-et-nam-inventore.html',
                'icon' => null,
            ]
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}
