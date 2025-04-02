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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminare definitivamente il post?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Una volta eliminata la tipologia non sarà piú disponibile!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('types.destroy', $type) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
