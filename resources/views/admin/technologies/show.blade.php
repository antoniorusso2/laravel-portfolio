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
                <x-ui.buttons.delete :trigger="'technology'" :item="$technology">
                    Elimina
                </x-ui.buttons.delete>
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <p>{{ $technology->description }}</p>
            </div>
        </div>
    </div>

    <x-delete-modal
        :trigger="'technology'"
        :route="route('technologies.destroy', $technology)"
        :item="$technology"
    />

@endsection
