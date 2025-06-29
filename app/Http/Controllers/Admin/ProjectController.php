<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterProjectRequest;
use App\Models\Media;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterProjectRequest $request)
    {
        $limit = $request->limit ?? 4;

        $filters = $request->validate([
            'filter' => 'nullable|string|max:50',
            'type_id' => 'nullable'
        ]);

        $query = Project::query();

        if (!empty($filters['type_id'])) {
            $query->where('type_id', $request->type_id);
        }

        if (!empty($filters['filter'])) {
            $query->where('name', 'like', '%' . $request->filter . '%');
        }

        $projects = $query->orderby('name', 'asc')->paginate($limit);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        // dd($types);
        //restituisce semplicemente una view dove poi si troverà il form
        return view('admin.projects.create', compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // 1. Crea progetto
        $newProject = new Project();
        $newProject->name = $data['name'];
        $newProject->customer = $data['customer'];
        $newProject->description = $data['description'];
        $newProject->type_id = $data['type_id'];
        $newProject->slug = Project::generateSlug($newProject->name);

        // Evita duplicati
        if (Project::where('slug', $newProject->slug)->exists()) {
            return 'Progetto omonimo già esistente';
        }

        $newProject->save();

        // 2. Aggiunge tecnologie
        $newProject->technologies()->attach($data['technologies'] ?? []);

        // 3. Salva media (immagini/video)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                // Salva il file in storage/public/uploads/media
                $path = $file->store('uploads/media', 'public');

                // Determina tipo mime
                $mime = $file->getMimeType();
                $type = str_starts_with($mime, 'image/') ? 'image' : 'video';

                // Salva media nel DB
                $media = new Media();
                $media->url = $path;
                $media->type = $type;
                $media->project_id = $newProject->id;
                $media->save();
            }
        }

        return redirect(route('projects.show', $newProject));
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $project->load('media');

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all(); //array associativo

        // dd($data);

        $project->name = $data['name'];
        $project->customer = $data['customer'];
        $project->description = $data['description'];
        $project->type_id = $data['type_id'];

        $newSlug = Project::generateSlug($project['name']);

        // dd($project->slug, $newSlug);

        //controllo slug diverso da quello precedente
        if ($newSlug != $project->slug) {
            // creazione slug
            $project->slug = $newSlug;

            //controllo slug diverso da tutti gli altri
            if (Project::all()->contains('slug', $newSlug)) {
                // se esiste un progetto con lo stesso slug
                return 'Progetto omonimo già esistente';
            }
        }

        // $project->update();
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                // Salva il file in storage/public/uploads/media
                $path = $file->store('uploads/media', 'public');

                // Determina tipo mime
                $mime = $file->getMimeType();
                $type = str_starts_with($mime, 'image/') ? 'image' : 'video';

                // Salva media nel DB
                $media = new Media();
                $media->url = $path;
                $media->type = $type;
                $media->project_id = $project->id;
                $media->save();
            }
        }

        $project->update();

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']); //con il metodo sync si aggiorna automaticamente la tabella pivot in base ai valori passati
        } else {
            $project->technologies()->detach();
        }

        return redirect(route('projects.show', $project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // se l'immagine esiste ed è diversa da null in questo punto allora controllo se esiste in local storage e la elimino anche dallo storage locale
        dd("delete", $project);
        if ($project->image && Storage::exists($project->image)) {
            Storage::delete($project->image);
            // dd('immagine presente in local storage');
        }

        $project->delete();
        return redirect(route('projects.index'));
    }
}
