{{-- @dd($project) --}}

<div class="card h-100">
    <img src="https://placehold.co/600x400" alt="screenshot project" class="card-img-top">
    <div class="card-body d-flex flex-column justify-content-between align-items-start">
        <div class="card-title text-truncate w-100">
            <a href="{{ route('projects.show', $project) }}" class="text-decoration-none fs-5 fw-bold">
                {{ $project->name }}
            </a>
        </div>
        <div class="card-text">
            {{-- <p class="description"> Descrizione: <span class="text-muted">{{ $project->description }}</span></p> --}}
            <p class="customer">
                Cliente: {{ $project->customer }}
            </p>
        </div>

        <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary align-self-end">Dettagli</a>
    </div>
</div>
