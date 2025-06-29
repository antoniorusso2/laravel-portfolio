<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tecnologie') }}
        </h2>
    </x-slot>
    <div class="container">
        <a class="btn special" href="{{ route('technologies.create') }}">Aggiungi una nuova tecnologia</a>
    </div>

    <div class="container">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            @foreach ($technologies as $technology)
                <x-card :item="$technology" :route="route('technologies.show', $technology)" />
            @endforeach
        </div>
    </div>
</x-app-layout>
