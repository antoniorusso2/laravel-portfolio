<x-app-layout>
    <x-sub-header-cta
        :page="'show'"
        :item="$technology"
        :hasDelete="true"
    />

    {{-- <div class="container">
        <div class="">
            <h1 class="text-4xl inline-block me-5">{{ $technology->name }}</h1>

            @if ($technology->icon_path != null && !empty($technology->icon_path))
                <img
                    class="inline-block"
                    src="{{ assets('storage/' . $technology->icon_path) }}"
                    alt="{{ $technology->name }}"
                >
            @else
                <img
                    class="inline-block"
                    src="{{ $technology->icon_external_url }}"
                    alt=""
                >
            @endif
        </div>

        <div class="badge my-4 text-xl gap-4">
            <span class="block mb-5">Colore:</span>
            <span class="block badge p-3 w-16 h-16 rounded-full" style="background-color: {{ $technology->color }}"></span>
        </div>
    </div> --}}

    <div class="container mx-auto mt-8">
        {{-- Header: nome e icona --}}
        <div class="flex items-center gap-4 mb-8">
            <h1 class="text-4xl font-bold ">{{ $technology->name }}</h1>

            @if ($technology->icon_path)
                <img
                    class="w-12 h-12 object-contain"
                    src="{{ asset('storage/' . $technology->icon_path) }}"
                    alt="{{ $technology->name }}"
                >
            @elseif($technology->icon_external_url)
                <img
                    class="w-12 h-12 object-contain"
                    src="{{ $technology->icon_external_url }}"
                    alt="{{ $technology->name }}"
                >
            @endif
        </div>

        {{-- Colore e livello di abilità --}}
        <div class="flex flex-wrap items-center gap-12">
            {{-- Colore --}}
            <div class="flex items-center gap-4">
                <span class="text-lg font-medium text-gray-400">Colore:</span>
                <span class="inline-block w-10 h-10 rounded-full border border-gray-300 shadow-sm" style="background-color: {{ $technology->color }}"></span>
            </div>

            {{-- Livello di abilità --}}
            <div>
                <div class="flex gap-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="w-8 h-3 rounded-full 
                        {{ $i <= $technology->level ? 'bg-blue-500' : 'bg-gray-300' }}">
                        </div>
                    @endfor
                </div>

                <span class="text-sm text-gray-500 mt-2 block">
                    Livello {{ $technology->level }} / 5
                </span>
            </div>
        </div>
    </div>


    {{-- modal --}}
    <x-delete-modal
        :type="'technology'"
        :item="$technology"
        action="{{ route('technologies.destroy', $technology) }}"
    />

</x-app-layout>
