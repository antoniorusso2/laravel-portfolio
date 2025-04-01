<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.projects-types.index', compact('types'));
    }

    public function show(Type $type)
    {

        return view('admin.projects-types.show', compact('type'));
    }

    public function create()
    {
        return view('admin.projects-types.create');
    }
}
