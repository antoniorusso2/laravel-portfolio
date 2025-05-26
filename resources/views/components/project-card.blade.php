{{-- @dd($project->media) --}}

<div class="card h-100">
    <div id="cardCarousel{{ $project->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @forelse ($project->media as $media)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img
                        src="{{ asset('storage/' . $media->url) }}"
                        onerror="this.src='https://placehold.co/600x400';"
                        alt="screenshot project"
                        class="card-img-top"
                        style="height: 160px; object-fit: cover; object-position: center"
                    >
                </div>
            @empty
                <img
                    class="card-img-top"
                    style="height: 160px; object-fit: cover; object-position: center"
                    src="https://placehold.co/600x400"
                    alt=""
                >
            @endforelse
        </div>
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#cardCarousel{{ $project->id }}"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#cardCarousel{{ $project->id }}"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="card-body d-flex flex-column justify-content-between align-items-start">
        <div class="card-title text-truncate w-100">
            <a href="{{ route('projects.show', $project) }}" class="text-decoration-none text-capitalize fs-5 fw-bold">
                {{ $project->name }}
            </a>
        </div>
        @if ($project->customer)
            <div class="card-text">
                <p class="customer">
                    Cliente: {{ $project->customer }}
                </p>
            </div>
        @endif

        <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary align-self-end">Dettagli</a>
    </div>
</div>
