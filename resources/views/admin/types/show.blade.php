<x-app-layout>
    <div class="container">
        <div class="flex gap-4 w-full justify-start flex-wrap">
            <a class="btn special" href="{{ route('types.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('types.edit', $type) }}">Modifica</a>

            {{-- delete --}}
            <button
                class="btn special delete md:ms-auto"
                id="modal-trigger"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-type-{{ $type->id }}')"
            >Elimina</button>
        </div>
    </div>

    <div class="container">
        <h1 class="text-4xl">{{ $type->name }}</h1>
        <p class="text-thin mt-8">- {{ $type->description }}</p>
    </div>

    {{-- modal --}}
    <x-delete-modal
        :type="'type'"
        :item="$type"
        :action="route('types.destroy', $type)"
    />

</x-app-layout>
