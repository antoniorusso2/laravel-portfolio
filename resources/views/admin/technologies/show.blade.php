<x-app-layout>
    <x-sub-header-cta
        :page="'show'"
        :item="$technology"
        :hasDelete="true"
    />

    <div class="container">
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
        {{-- icon --}}

        <div class="badge my-4 text-xl gap-4">
            <span class="block mb-5">Colore:</span>
            <span class="block badge p-3 w-16 h-16 rounded-full" style="background-color: {{ $technology->color }}"></span>
        </div>
    </div>

    {{-- modal --}}
    <x-delete-modal
        :type="'technology'"
        :item="$technology"
        action="{{ route('technologies.destroy', $technology) }}"
    />

</x-app-layout>
