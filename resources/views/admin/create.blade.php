@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row row-gap-3">
            <div class="col-12 text-center">
                <h1>Create Project</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('projects.store') }}" method="post" class="w-50 mx-auto">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" id="image" name="image">
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
