<div class="card">

    <div class="card-body d-flex  align-items-center justify-content-center">
        <div class="card-title text-truncate w-100 text-center">
            <a href="{{ route('technologies.show', $technology) }}" class="text-decoration-none text-dark text-capitalize fs-5 fw-bold">
                {{ $technology->name }}
            </a>
        </div>
    </div>
</div>
