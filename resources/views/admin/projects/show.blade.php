@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <div class="container mt-5">
        <div class="row row-gap-3">
            <div class="col-8">
                <h1 class="display-5 fw-bold text-capitalize">{{ $project->name }}</h1>
                @if ($project->type != null)
                    {{-- <p class=" d-inline px-2 py-1 project_type fw-bold fs-4 text-uppercase bg-dark bg-gradient text-white text-center">{{ $project->type->name }}</p> --}}
                    <div class="badge px-3 py-1 fw-bold fs-4 text-uppercase bg-dark bg-gradient text-white text-center rounded-xs">{{ $project->type->name }}</div>
                @endif
            </div>
            <div class="col-4 pt-3 justify-content-end d-flex justify-content-end align-items-start gap-2">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-warning">Modifica</a>
                {{-- form per l'eliminazione --}}
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Elimina
                </button>
            </div>

            {{-- tech stack --}}
            @if ($project->technologies->count() > 0)
                <div class="col-12">
                    <h2 class="text-capitalize">
                        Tech Stack
                    </h2>
                </div>
                <div class="col-12">
                    <ul class="list-group list-group-horizontal column-gap-2">
                        @foreach ($project->technologies as $technology)
                            <li class="badge" style="background-color: {{ $technology->color }}">{{ $technology->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12 col-md-6">
                <img src='{{ asset('storage/' . $project->image) }}' onerror="this.src='https://placehold.co/600x400';" alt="immagine progetto" class="card-img-top">
            </div>
            <div class="col-12 col-md-6">
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <x-delete-modal :route="route('projects.destroy', $project)" :item="$project" />
@endsection
