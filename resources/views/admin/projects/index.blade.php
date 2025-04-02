@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
    <div class="container mt-3">
        {{-- link al form per la creazione di un nuovo progetto --}}
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Aggiungi Progetto</a>
        <div class="row row-gap-3">
            @foreach ($projects as $project)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <x-project-card :$project />
                </div>
            @endforeach
        </div>
    </div>
@endsection
