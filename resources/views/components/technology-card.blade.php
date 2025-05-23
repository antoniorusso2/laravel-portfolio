<div class="card">

    <div class="card-body">
        <div class="text-truncate w-100 text-center  d-flex  align-items-center justify-content-center">
            <a href="{{ route('technologies.show', $technology) }}" class="text-decoration-none  text-capitalize fs-5 fw-bold">
                {{ $technology->name }}
            </a>
        </div>
    </div>
</div>
