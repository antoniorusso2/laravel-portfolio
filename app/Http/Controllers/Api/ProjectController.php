<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return response()->json([
            'results' => $projects,
            'success' => true
        ]);

        // dd(response()->json($projects));

        return response()->json($projects);
    }

    public function show(Project $project)
    {
        return response()->json([
            'result' => $project,
            'success' => true
        ]);
    }
}
