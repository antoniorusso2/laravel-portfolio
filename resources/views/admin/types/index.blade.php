<x-app-layout>
    {{-- @dd($types) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tipologie progetti') }}
        </h2>
    </x-slot>

    <x-sub-header-cta page="index" route="{{ route('types.create') }}">
        Aggiungi una nuova tipologia
    </x-sub-header-cta>

    <div class="container">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            {{-- @dd($types) --}}
            @foreach ($types as $type)
                <x-card :item="$type" :route="route('types.show', $type)" />
            @endforeach
        </div>
    </div>
</x-app-layout>
