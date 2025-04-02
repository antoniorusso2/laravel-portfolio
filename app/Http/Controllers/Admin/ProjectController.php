<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

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

        // dd($types);
        //restituisce semplicemente una view dove poi si troverà il form
        return view('admin.projects.create', compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); //array associativo

        $newProject = new Project(); //istanza del modello

        $newProject->name = $data['name'];
        $newProject->customer = $data['customer'];
        $newProject->description = $data['description'];
        $newProject->image = $data['image'];
        $newProject->type_id = $data['type_id'];

        // creazione slug
        $newProject['slug'] = Project::generateSlug($newProject['name']);

        if (Project::all()->contains('slug', $newProject['slug'])) {
            // se esiste un progetto con lo stesso slug
            return 'Progetto omonimo già esistente';
        } else {
            $newProject->save();

            // dd($newProject);

            return redirect(route('admin.projects.show', $newProject));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->type);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all(); //array associativo

        $project->name = $data['name'];
        $project->customer = $data['customer'];
        $project->description = $data['description'];
        $project->image = $data['image'];
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

        $project->update();

        return redirect(route('admin.projects.show', $project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect(route('admin.projects.index'));
    }
}
