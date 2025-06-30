@props(['item', 'action', 'type' => null, 'id' => null])
@php
    // dd($type);

    $messages = [
        'project' => 'Sei sicuro di voler eliminare questo progetto?',
        'image' => 'Sei sicuro di voler eliminare questa immagine?',
        'type' => 'Sei sicuro di voler eliminare questa tipologia?',
        'technology' => 'Sei sicuro di voler eliminare questa tecnologia?',
    ];

    $alerts = [
        'image' => 'Una volta eliminata non sarà più disponibile!',
        'type' => 'Una volta eliminata non sarà più disponibile!',
        'technology' => 'Una volta eliminata non sarà più disponibile!',
    ];

    $messageFallback = 'Sei sicuro di voler eliminare questo elemento?';
    $alertFallback = 'Una volta eliminato non sarà più disponibile!';

@endphp

<x-modal name="delete-{{ $type }}-{{ $item->id }}" focusable>
    <form
        method="post"
        action="{{ $action }}"
        class="p-6"
    >
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $messages[$type] ?? $messageFallback }}
        </h2>

        <p class="mt-1 text-sm font-semibold text-rose-600 uppercase">
            {{ $alerts[$type] ?? $alertFallback }}
        </p>

        <div class="mt-6 flex justify-end gap-x-2" x-on:click="$dispatch('close')">
            <button type="button" class="btn special">
                Annulla
            </button>

            <button class="btn special delete">
                Elimina
            </button>
        </div>
    </form>
</x-modal>
