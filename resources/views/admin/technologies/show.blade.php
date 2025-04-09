@extends('layouts.app')

@section('title', $technology->name)

@section('content')
    <div class="container">
        <div class="row flex-wrap align-items-center mb-5 row-gap-3">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    {{ $technology->name }}
                    <div class="badge rounded-pill" style="background-color: {{ $technology->color }}">{{ $technology->name }}</div>
                </h2>
            </div>

            <div class="col">
                <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-outline-warning">Modifica</a>
                {{-- form per l'eliminazione --}}
                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Elimina</button">
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <p>{{ $technology->description }}</p>
            </div>
        </div>
    </div>

    <x-delete-modal :route="route('technologies.destroy', $technology)" :item="$technology" />

@endsection
