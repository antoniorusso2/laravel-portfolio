@props(['type' => 'item', 'media'])
<button
    type="button"
    class="btn btn-danger btn-sm py-0 my-1 me-1 position-absolute top-0 end-0"
    data-bs-toggle="modal"
    data-bs-target="#{{ $type }}DeleteModal{{ $media->id }}"
>
    x
</button>
