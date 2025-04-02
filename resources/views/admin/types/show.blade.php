@extends('layouts.app')

@section('title', $type->name)

@section('content')
    <div class="container">
        <div class="row flex-wrap mb-5">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    Tipologia {{ $type->name }}
                </h2>
            </div>
            <div class="col">
                <a href="{{ route('types.edit', $type) }}" class="btn btn-outline-warning">Modifica</a>
                {{-- form per l'eliminazione --}}
                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Elimina</button">
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <p>{{ $type->description }}</p>
            </div>
        </div>
    </div>

    <x-delete-modal :route="route('types.destroy', $type)" :item="$type" />

@endsection
