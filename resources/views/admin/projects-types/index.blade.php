@extends('layouts.app')

@section('title', 'Tipologie per i progetti')

@section('content')
    <div class="container mb-5">
        {{-- @dd(route('types.create')) --}}
        <a href="{{ route('types.create') }}" class="btn btn-primary mb-3">Crea nuova tipologia</a>
    </div>
    <div class="container mt-3">
        <div class="row row-gap-3">
            @foreach ($types as $type)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <x-type-card :$type />
                </div>
            @endforeach
        </div>
    </div>
@endsection
