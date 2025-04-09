@extends('layouts.app')

@section('title', 'Crea Linguaggio o Framework')

@section('content')
    <div class="container">
        <div class="row flex-wrap mb-5">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    Crea Linguaggio o Framework
                </h2>
            </div>
            <div class="col">
                <a href="{{ route('technologies.index') }}" class="btn btn-outline-warning">Indietro</a>
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <form action="{{ route('technologies.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3 d-block">
                        <label for="color" class="form-label">Colore</label>
                        <input type="color" class="form-control w-25" id="color" name="color">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection
