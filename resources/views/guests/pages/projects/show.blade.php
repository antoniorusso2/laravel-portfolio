@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $project->name }}</h1>
                <p>{{ $project->description }}</p>
                <p>Cliente: {{ $project->customer }}</p>
            </div>
        </div>
    </div>
@endsection
