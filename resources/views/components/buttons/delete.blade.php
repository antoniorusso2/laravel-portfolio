@props(['trigger' => '', 'item'])

<button
    type="button"
    class="btn btn-outline-danger"
    data-bs-toggle="modal"
    data-bs-target="#{{ $trigger }}DeleteModal{{ $item->id }}"
>
    {{ $slot }}
</button>
