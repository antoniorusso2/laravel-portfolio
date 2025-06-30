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
                x-on:click.prevent="$dispatch('open-modal', 'delete-project-{{ $project->id }}')"
            >Elimina</button>
        </div>
    </div>

    @dd($project->media)

    @if ($project->media->count() > 0)
        @foreach ($project->media as $media)
            <div class="wrap relative flex flex-wrap gap-3">
                @foreach ($project->media as $media)
                    @if ($media->type === 'image')
                        <img src="{{ asset('storage/' . $media->url) }}" class="relative w-full h-auto object-cover">
                    @elseif ($media->type === 'video')
                        <video
                            src="{{ asset('storage/' . $media->url) }}"
                            controls
                            class="relative"
                        ></video>
                    @endif
                @endforeach
            </div>
        @endforeach
    @endif

    <div class="container">
        <div class="title flex flex-wrap flex-row items-center justify-between gap-4">
            <div class="name">
                <h1 class="text-4xl mb-2">{{ $project->name }}</h1>
                @if ($project->type)
                    <span class="badge rounded-sm py-1">{{ $project->type->name }}</span>
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
            <ul class="grid gap-3 grid-cols-2 sm:grid-cols-4 md:grid-cols-6">
                @foreach ($project->technologies as $technology)
                    <li class="badge my-2">
                        <span><img
                                class="w-20 object-cover object-center"
                                src="{{ $technology->icon_url }}"
                                alt="{{ $technology->name }}"
                            ></span>
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
