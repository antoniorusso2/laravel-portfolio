<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExportAllJson extends Command
{
    protected $signature = 'export:all-json {--path=public/data}';
    protected $description = 'Esporta tutti i dati del database in file json';

    public function handle()
    {
        $exportPath = base_path($this->option('path')); //cartella di export

        if (!file_exists($exportPath)) {
            mkdir($exportPath, 0755, true); //crea la cartella se non esiste con permessi 755, true crea eventuali sottocartelle mancanti
        }

        // Export projects
        $projects = Project::with('type', 'technologies', 'media')->get()->map(function ($project) {
            return [
                "id" => $project->id,
                "name" => $project->name,
                "slug" => $project->slug,
                "customer" => $project->customer,
                "description" => $project->description,
                "media" => $project->media->map(function ($media) {
                    return [
                        "url" => $media->url,
                        "type" => $media->type,
                    ];
                }),
                "technologies" => $project->technologies->pluck('name'),
                "external_link" => $project->external_link ?? null,
            ];
        });

        File::put($exportPath . '/projects.json', json_encode($projects));

        $this->info('Dati esportati con successo');

        //export technologies
        $technologies = Technology::all()->map(fn($technology) => [
            'id' => $technology->id,
            'name' => $technology->name,
            'level' => $technology->level,
            'color' => $technology->color,
            'icon_external_url' => $technology->icon_external_url
        ]);

        File::put("$exportPath/technologies.json", $technologies->toJson(JSON_PRETTY_PRINT));

        $this->info('Dati esportati con successo');

        $this->info("esportazione completata in $exportPath");
    }
}
