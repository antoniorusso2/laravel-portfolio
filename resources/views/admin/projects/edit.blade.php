@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')
    <div class="container mt-3">
        <div class="row row-gap-3">
            <div class="col-12 text-center">
                <h1>Modifica Progetto</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('projects.update', $project) }}" method="post" class="w-50 mx-auto" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del progetto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
                    </div>
                    <div class="mb-3">
                        @if ($project->image)
                            <div class="prev_img">
                                <p>Immagine attuale</p>
                                <img src="{{ asset('storage/' . $project->image) }}" alt="" class="w-25 img-fluid">
                                {{-- x icon for delete img --}}
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Elimina
                                </button>
                            </div>
                        @endif
                        <label for="image" class="form-label col-12">Immagine</label>
                        <input type="file" class="form-control mb-3" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-select" name="type_id" id="type">
                            {{-- type select --}}
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- technologies --}}
                    <div class="mb-3 d-flex flex-wrap column-gap-3">
                        <label class="form-label w-100" for="technologies" class="form-label">Linguaggi e Framework</label>
                        {{-- checkboxes --}}
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="technologies">
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="customer" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="customer" name="customer" value="{{ $project->customer }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Descrizione</label>
                        <textarea class="form-control w-100" name="description" id="description" cols="30" rows="3">{{ $project->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Eliminando l'immagine questa non sarà più disponibile</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <form action="{{ route('projects.destroyImage', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
