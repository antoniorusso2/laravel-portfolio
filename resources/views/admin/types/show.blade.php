<x-app-layout>
    <div class="container">
        <div class="row flex-wrap mb-5">
            <div class="col-12">
                <h2 class="text-capitalize my-4 fs-1">
                    Tipologia {{ $type->name }}
                </h2>
            </div>
            <div class="col">
                <a href="{{ route('types.edit', $type) }}" class="btn btn-outline-warning">Modifica</a>
                {{-- form per l'eliminazione --}}
                <x-ui.buttons.delete :trigger="'type'" :item="$type">
                    Elimina
                </x-ui.buttons.delete>
            </div>
        </div>
        <div class="row row-gap-3 description">
            <div class="col-12 col-md-6 fs-3">
                <p>{{ $type->description }}</p>
            </div>
        </div>
    </div>

    <x-delete-modal
        :trigger="'type'"
        :route="route('types.destroy', $type)"
        :item="$type"
    />

</x-app-layout>
