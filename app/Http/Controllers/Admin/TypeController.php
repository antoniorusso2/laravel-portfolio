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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $types = Type::all();

        // dd($types);
        //restituisce semplicemente una view dove poi si troverà il form
        return view('admin.projects-types.create');
    }

    public function store(Request $request)
    {
        $newType = new Type();
        $newType->name = $request->name;
        $newType->description = $request->description;
        $newType->save();

        return redirect(route('types.show', $newType));
    }

    public function show(Type $type)
    {
        return view('admin.projects-types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.projects-types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return redirect(route('types.show', $type));
    }
}
