{{-- @dd($project->image) --}}

<div class="card h-100">
    <img src="{{ asset('storage/' . $project->image) }}" onerror="this.src='https://placehold.co/600x400';" alt="screenshot project" class="card-img-top h-100">
    <div class="card-body d-flex flex-column justify-content-between align-items-start">
        <div class="card-title text-truncate w-100">
            <a href="{{ route('projects.show', $project) }}" class="text-decoration-none text-dark text-capitalize fs-5 fw-bold">
                {{ $project->name }}
            </a>
        </div>
        <div class="card-text">
            <p class="customer">
                Cliente: {{ $project->customer }}
            </p>
        </div>

        <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary align-self-end">Dettagli</a>
    </div>
</div>
