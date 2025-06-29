<x-app-layout>
    <div class="container">
        <div class="flex gap-4 w-full justify-start flex-wrap">
            <a class="btn special" href="{{ route('technologies.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('technologies.edit', $technology) }}">Modifica</a>

            {{-- delete --}}
            <button
                class="btn special delete ms-auto"
                id="modal-trigger"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-technology-deletion')"
            >Elimina</button>
        </div>
    </div>

    <div class="container">
        <h1 class="text-4xl">{{ $technology->name }}</h1>
        <div class="badge my-4 text-xl flex gap-4">
            Colore: <span class="block badge p-3 w-16" style="background-color: {{ $technology->color }}"></span>
        </div>
    </div>

    {{-- modal --}}
    <x-delete-modal
        :type="'technology'"
        :item="$technology"
        action="{{ route('technologies.destroy', $technology) }}"
    />

</x-app-layout>
