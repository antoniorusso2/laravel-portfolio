<x-app-layout>
    <div class="container">
        <div class="flex w-full flex-wrap justify-start gap-4">
            {{-- <a class="btn special" href="{{ route('projects.index') }}">Indietro</a> --}}
            <x-buttons.go-back-btn />
            <a class="btn special" href="{{ route('projects.edit', $project) }}">Modifica</a>

            {{-- delete --}}
            <button
                class="btn special delete md:ms-auto"
                id="modal-trigger"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-project-deletion')"
            >Elimina</button>
        </div>
    </div>

    @if ($project->image)
        <div class="img__wrap container">
            <img
                class="max-w-xs"
                src="{{ asset('storage/' . $project->image) }}"
                alt=" {{ $project->name }} anteprima immagine"
            >
            {{-- @dd(asset('storage/' . $project->image)) --}}
        </div>
    @endif

    <div class="container">
        <div class="title_price flex flex-wrap flex-row items-center justify-between gap-4">
            <div class="name">
                <h1 class="text-4xl mb-2">{{ $project->name }}</h1>
                @if ($project->type)
                    <span class="badge rounded-sm px-3 py-1" style="background-color: {{ $project->type->color }}">{{ $project->type->name }}</span>
                @else
                    <span class="badge rounded-sm py-1 text-gray-500 italic">Nessuna categoria selezionata</span>
                @endif
            </div>
        </div>

        <hr class="mt-4">

        <p class="text-thin mt-8">- {{ $project->description }}</p>
    </div>

    {{-- project technologies --}}
    @if ($project->technologies->count() > 0)
        <div class="container">
            <h2 class="mb-4 text-3xl">Tech Stack:</h2>
            <ul class="flex flex-col flex-wrap gap-4">
                @foreach ($project->technologies as $ingredient)
                    <li class="badge my-2">
                        - {{ $ingredient->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- delete modal --}}
    <x-delete-modal
        :type="'project'"
        :item="$project"
        :action="route('projects.destroy', $project)"
    />

</x-app-layout>
