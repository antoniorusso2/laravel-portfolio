@props(['itemToDelete' => null, 'id' => ''])

<button
    type="button"
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'delete-{{ $itemToDelete }}-{{ $id }}')"
>
    {{ $slot }}
</button>
