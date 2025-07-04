<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $types = Type::all();

        // dd($types);
        //restituisce semplicemente una view dove poi si troverà il form
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $newType = new Type();

        $newType->name = $data['name'];
        $newType->description = $data['description'];

        $newType->save();

        return redirect(route('types.show', $newType));
    }

    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $type->name = $request->name;
        $type->description = $request->description;

        $type->save();

        return redirect(route('types.show', $type));
    }

    public function destroy(Type $type)
    {
        dd("delete", $type);

        // eliminazione del valore nella colonna type_id dei progetti collegati alla tipologia
        Project::where('type_id', $type->id)->update(['type_id' => null]);

        $type->delete();

        return redirect(route('types.index'));
    }
}
