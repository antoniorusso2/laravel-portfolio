@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <div class="container mt-5">
        <div class="row row-gap-3">
            <div class="col-12">
                <h1 class="display-5 fw-bold text-capitalize">{{ $project->name }}</h1>
                @if ($project->type != null)
                    <p class=" d-inline px-2 py-1 project_type fw-bold fs-4 text-uppercase bg-dark bg-gradient text-white text-center">{{ $project->type->name }}</p>
                @endif
            </div>
            <div class="col-12 d-flex gap-3">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-warning">Modifica</a>
                {{-- form per l'eliminazione --}}
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Elimina
                </button>
            </div>

            {{-- tech stack --}}
            <div class="col-12">
                <h2 class="text-capitalize">
                    Tech Stack
                </h2>
            </div>
            <div class="col-12">
                <ul class="list-group list-group-horizontal">
                    @foreach ($project->technologies as $technology)
                        <li class="badge rounded-pill" style="background-color: {{ $technology->color }}">{{ $technology->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <img src='https://placehold.co/600x400' alt="immagine progetto" class="card-img-top">
            </div>
            <div class="col-12 col-md-6">
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>

    <x-delete-modal :route="route('projects.destroy', $project)" :item="$project" />
@endsection
