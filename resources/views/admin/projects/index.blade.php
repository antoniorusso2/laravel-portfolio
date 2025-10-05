<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tutti i progetti') }}
        </h2>
    </x-slot>

    <x-sub-header-cta page="index" route="{{ route('projects.create') }}">
        Crea un nuovo progetto
    </x-sub-header-cta>

    <div class="container">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4 my-4">
            @if (count($projects) == 0)
                <div class="no-content">
                    Ancora nessun progetto da mostrare
                </div>
            @endif
            @foreach ($projects as $dish)
                <x-card :item="$dish" :route="route('projects.show', $dish)" />
            @endforeach
        </div>

        {{ $projects->links() }}
    </div>
</x-app-layout>
