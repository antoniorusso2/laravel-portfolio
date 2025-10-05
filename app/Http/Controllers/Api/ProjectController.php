<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit ?? 4;

        $query = Project::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $projects = $query->paginate(4);

        $projects->load('type', 'technologies', 'media');

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies', 'media');

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
