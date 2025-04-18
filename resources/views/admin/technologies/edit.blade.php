@extends('layouts.app')

@section('title', 'Modifica Linguaggio o Framework')

@section('content')
    <div class="container">
        <div class="row flex-wrap align-items-center mb-5 row-gap-3">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    Modifica Linguaggio o Framework
                </h2>
            </div>

            <div class="col">
                <a href="{{ route('technologies.index') }}" class="btn btn-outline-primary">Indietro</a>
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <form action="{{ route('technologies.update', $technology) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $technology->name }}">
                    </div>
                    <div class="mb-3 d-block">
                        <label for="color" class="form-label">Colore</label>
                        <input type="color" class="form-control w-25" id="color" name="color" value="{{ $technology->color }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
