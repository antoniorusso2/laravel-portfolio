@extends('layouts.app')

@section('title', 'Modifica Tipologia')

@section('content')
    <div class="container">
        <div class="row flex-wrap mb-5">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    Modifica Tipologia
                </h2>
            </div>
            <div class="col">
                <a href="{{ route('types.index') }}" class="btn btn-outline-primary">Indietro</a>
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <form action="{{ route('types.update', $type) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $type->description }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
