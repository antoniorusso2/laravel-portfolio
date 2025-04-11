@extends('layouts.app')
@section('title', 'Crea Progetto')

@section('content')
    <div class="container mt-3">
        <div class="row row-gap-3">
            <div class="col-12 text-center">
                <h1>Crea Progetto</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('projects.store') }}" method="post" class="w-50 mx-auto" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    {{-- type --}}
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-select" name="type_id" id="type">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- technologies --}}
                    <div class="mb-3 d-flex flex-wrap column-gap-3">
                        <label class="form-label w-100" for="technologies" class="form-label">Linguaggi e Framework</label>
                        {{-- checkboxes --}}
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]">
                                <label class="form-check-label" for="technologies">
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="customer" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="customer" name="customer">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Descrizione</label>
                        <textarea class="form-control w-100" name="description" id="description" cols="30" rows="3">
    
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
