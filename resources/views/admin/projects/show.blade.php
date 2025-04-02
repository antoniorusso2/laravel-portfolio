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

            <div class="col-12 col-md-6">
                <img src='https://placehold.co/600x400' alt="immagine progetto" class="card-img-top">
            </div>
            <div class="col-12 col-md-6">
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>

    <x-delete-modal :route="route('projects.destroy', $project)" :item="$project" />

    {{-- <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminare definitivamente il post?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Una volta eliminato il post non sarà più disponibile!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('projects.destroy', $project) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
