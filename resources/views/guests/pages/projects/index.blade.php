@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row row-gap-3">
            @foreach ($projects as $project)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <x-project-card :$project />
                </div>
            @endforeach
        </div>
    </div>
@endsection
