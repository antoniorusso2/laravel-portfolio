@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row row-gap-3">
            <div class="col-12">
                <h1>{{ $project->name }}</h1>
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Modifica</a>
            </div>
            <div class="col-12 col-md-6">
                <img src="https://placehold.co/600x400" alt="screenshot project" class="card-img-top">
            </div>
            <div class="col-12 col-md-6">
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>
@endsection
