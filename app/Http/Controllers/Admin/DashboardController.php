<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $projects = Project::all();
        $technologies = Technology::all();
        $types = Type::all();

        // dd($projects);

        // dd($user);
        return view('dashboard', compact('user_id', 'projects', 'technologies', 'types'));
    }
}
