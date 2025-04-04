@extends('layouts.app')

@section('title', 'Linguaggi e Framework')

@section('content')
    <div class="container mt-3">
        <div class="row row-gap-3">
            @foreach ($technologies as $technology)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <p>{{ $technology->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
