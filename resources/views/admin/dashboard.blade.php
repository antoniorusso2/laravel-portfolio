<x-app-layout>
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    {{-- pannello modifica progetti --}}
                    <div class="card-body">
                        <a href="{{ route('projects.index') }}" class="btn btn-primary">Modifica progetti</a>
                        <a href="{{ route('types.index') }}" class="btn btn-primary">Modifica tipologie</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
