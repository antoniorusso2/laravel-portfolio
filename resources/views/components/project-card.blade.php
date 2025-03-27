{{-- @dd($project) --}}

<div class="card h-100">
    <img src="https://placehold.co/600x400" alt="screenshot project" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">
            {{ $project->name }}
        </h5>
        <div class="card-text h-100">
            <p class="description"> Descrizione: <span class="text-muted">{{ $project->description }}</span>
            </p>
            <p class="customer">
                Cliente: {{ $project->customer }}
            </p>
        </div>
    </div>
</div>
