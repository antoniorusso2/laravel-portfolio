<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index()
    {
        //return all posts
        $projects = Project::all();

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
        $data = $request->all(); //array associativo

        // dd($data);

        $newProject = new Project(); //istanza del modello

        $newProject->name = $data['name'];
        $newProject->customer = $data['customer'];
        $newProject->description = $data['description'];

        if (isset($data['image'])) {

            $newProject->image = $data['image'];
            $img_url = Storage::disk('public')->put('uploads', $data['image']);

            $newProject->image = $img_url;
        }

        // echo asset('storage/' . $img_url);

        $newProject->type_id = $data['type_id'];

        // dd($newProject);

        // creazione slug
        $newProject['slug'] = Project::generateSlug($newProject['name']);

        if (Project::all()->contains('slug', $newProject['slug'])) {
            // se esiste un progetto con lo stesso slug
            return 'Progetto omonimo già esistente';
        } else {
            $newProject->save();

            $newProject->technologies()->attach($data['technologies']); //dopo aver salvato il record si va ad interagire con la tabella pivot
            // dd($newProject);

            return redirect(route('projects.show', $newProject));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->technologies);
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

        if ($project->image && $data['image']) {
            // dd('vecchia immagine presente');
            // se esiste l'immagine e non è null allora elimino l'immagine precedente dallo storage locale
            Storage::delete($project->image);
            $project->image = Storage::putFile('uploads', $data['image']);
        } else if (isset($data['image'])) {

            // dd('nuova immagine');
            $img_url = Storage::putFile('uploads', $data['image']);
            // Storage::putFile('uploads', $data['image']);

            $project->image = $img_url;
        }

        // dd($project);
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
        if ($project->image && Storage::exists($project->image)) {
            Storage::delete($project->image);
            // dd('immagine presente in local storage');
        }

        $project->delete();
        return redirect(route('projects.index'));
    }

    public function destroyImage(Project $project)
    {
        // ??temporary bin in storage future update
        if (Storage::has($project->image)) {
            Storage::delete($project->image);
        }

        $project->image = null;
        $project->update();
        return redirect(route('projects.edit', $project));
    }
}
