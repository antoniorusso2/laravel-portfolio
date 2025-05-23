@props(['items' => []])

<div id="mediaCarousel" class="carousel slide col-12 col-md-6">
    <div class="carousel-inner ">
        @foreach ($items as $media)
            <div class="carousel-item active">
                <img
                    src="{{ $media->url }}"
                    onerror="this.src='https://placehold.co/600x400';"
                    class="d-block w-100"
                    alt="immagini progetto"
                >
            </div>
        @endforeach
    </div>
    <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#mediaCarousel"
        data-bs-slide="prev"
    >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next text-light"
        type="button"
        data-bs-target="#mediaCarousel"
        data-bs-slide="next"
    >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
