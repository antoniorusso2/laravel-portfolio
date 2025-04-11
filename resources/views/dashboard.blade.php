@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- @dd($projects) --}}

                        @if (count($projects) > 0)
                            <div class="row row-gap-3">
                                <div class="col-12">
                                    <h2 class="text-capitalize my-4 fs-1">
                                        {{ Auth::user()->name }}
                                    </h2>
                                </div>
                            </div>

                            <div class="cta row row-gap-3 align-items-center">
                                <div class="col-12 d-flex jusitify-content-between">
                                    <span>Totale <strong>Progetti:</strong> {{ count($projects) }}</span>
                                    <div class="cta-btn ms-auto">
                                        <a href="{{ route('projects.index') }}" class="btn btn-outline-warning">Modifica</a>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-12 d-flex jusitify-content-between">
                                    <span>Totale <strong>Tipologie</strong>: {{ count($types) }}</span>
                                    <div class="cta-btn ms-auto">
                                        <a href="{{ route('types.index') }}" class="btn btn-outline-warning">Modifica</a>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-12 d-flex jusitify-content-between">
                                    <span>Totale <strong>Linguaggi e framework</strong>: {{ count($technologies) }}</span>
                                    <div class="cta-btn ms-auto">
                                        <a href="{{ route('technologies.index') }}" class="btn btn-outline-warning">Modifica</a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
