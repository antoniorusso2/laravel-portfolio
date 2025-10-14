<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Technologies\StoreTechnologyRequest;
use App\Http\Requests\Technologies\UpdateTechnologyRequest;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        dd($request->all());
        $data = $request->all();
        $newTechnology = new Technology();

        //aggiunta link esterno o file nello storage locale del server
        if (isset($data['icon'])) {
            Storage::putFile($data['icon']);
            $newTechnology->icon = $data['icon'];
        } else {
            $newTechnology->icon_url = $data['icon_external_url'];
        }

        $newTechnology->name = $data['name'];
        $newTechnology->color = $data['color'];
        $newTechnology->level = $data['level'];

        $newTechnology->save();

        return redirect(route('technologies.show', $newTechnology));
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $validated = $request->all();

        //aggiunta link esterno o file nello storage locale del server
        if (isset($validated['icon'])) {
            Storage::putFile($validated['icon']);
            $technology->icon = $validated['icon'];
        } else if (isset($validated['icon_external_url'])) {
            $technology->icon_url = $validated['icon_external_url'];
        }

        $technology->name = $validated['name'];
        $technology->color = $validated['color'];
        $technology->level = $validated['level'];

        $technology->save();

        return redirect(route('technologies.show', $technology));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        // eliminazione del valore nella colonna technology id dalla tabella pivot
        DB::table('project_technology')->where('technology_id', $technology->id)->delete();

        $technology->delete();

        return redirect(route('technologies.index'));
    }
}
