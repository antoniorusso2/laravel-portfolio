@props(['items' => [], 'width' => 'w-100'])

<style>
    .img-fit {
        object-fit: cover;
        object-position: center;
        height: 400px;
        width: 100%;
    }
</style>

<div
    id="carouselExampleIndicators"
    class="carousel slide {{ $width }}"
    data-bs-ride="carousel"
>
    <div class="carousel-indicators">
        @foreach ($items as $item)
            <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"
                aria-current="{{ $loop->first ? 'true' : 'false' }}"
                aria-label="Slide {{ $loop->index + 1 }}"
            ></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($items as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img
                    src="{{ asset('storage/' . $item->url) }}"
                    {{-- src="{{ $item->url }}" --}}
                    class="img-fit d-block"
                    alt="..."
                >
            </div>
        @endforeach
    </div>
    <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"
    >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next"
    >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
