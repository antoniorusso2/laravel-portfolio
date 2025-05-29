@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')
    <div class="container mt-3">
        <div class="row row-gap-3 align-items-center">

            <div class="col ms-auto text-center mb-3">
                <h1 class="d-inline-block display-5 fw-bold mx-auto">Modifica Progetto</h1>

            </div>

        </div>
        <div class="row">

            <div class="col-12">
                @livewire('project-form', ['project' => $project, 'types' => $types, 'technologies' => $technologies, 'media' => $project->media])
            </div>
        </div>
    </div>

    <x-delete-modal :route="route('projects.destroy', $project)" :item="$project" />

    @foreach ($project->media as $media)
        <x-delete-modal
            :type="'media'"
            :route="route('media.destroy', $media)"
            :item="$media"
        />
    @endforeach

@endsection
