<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tutti i progetti') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="flex flex-col sm:flex-row justify-between items-start">
            <a class="btn special" href="{{ route('projects.create') }}">Crea nuovo Piatto</a>
            {{-- <x-items-per-page
                action="{{ route('projects.index') }}"
                :limits="[4, 8, 12]"
                :selected="$projects->perPage()"
            /> --}}
        </div>
    </div>

    <div class="container">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
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
