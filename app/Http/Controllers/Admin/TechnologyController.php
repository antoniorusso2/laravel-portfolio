<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        dd($data);

        //aggiunta link esterno o file nello storage locale del server
        if (isset($data['icon'])) {
            Storage::putFile($data['icon']);
            $newTechnology->icon = $data['icon'];
            exit;
        } else if ($data['icon_external_url']) {
            
        }
        $newTechnology = new Technology();

        $newTechnology->name = $data['name'];
        $newTechnology->color = $data['color'];

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
    public function update(Request $request, Technology $technology)
    {
        // dd($request->all());

        $data = $request->all();

        $technology->name = $data['name'];
        $technology->color = $data['color'];
        $technology->icon_url = $data['icon'];

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
