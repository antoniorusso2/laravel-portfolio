<x-app-layout>
    <div class="container">

        <x-sub-header-cta
            :page="'show'"
            :item="$project"
            :hasDelete="true"
        />

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

            <hr class="my-4">

            {{-- description --}}
            @if ($project->description)
                <div class="description">
                    <p>{{ $project->description }}</p>
                </div>
            @endif

            {{-- carousel media --}}

            @if ($project->media->count() > 0)
                <div data-carousel class="relative w-full mx-auto overflow-hidden shadow-lg  py-5">
                    <div class="media-wrapper relative h-96">
                        @foreach ($project->media as $index => $media)
                            <div class="media-slide absolute inset-0 transition-opacity duration-500 " data-index="{{ $index }}">
                                @if ($media->type === 'image')
                                    <img
                                        src="{{ asset('storage/' . $media->url) }}"
                                        class="w-full h-full object-top object-cover"
                                        alt="Media {{ $index + 1 }}"
                                    />
                                @elseif ($media->type === 'video')
                                    <video
                                        src="{{ asset('storage/' . $media->url) }}"
                                        controls
                                        class="w-full h-full object-contain"
                                    ></video>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <button
                        type="button"
                        class="carousel-prev absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-20"
                        aria-label="Previous"
                    >
                        ‹
                    </button>
                    <button
                        type="button"
                        class="carousel-next absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-20"
                        aria-label="Next"
                    >
                        ›
                    </button>

                    <div class="carousel-dots flex justify-center gap-2 mt-4">
                        @foreach ($project->media as $index => $media)
                            <button
                                type="button"
                                class="dot w-3 h-3 rounded-full cursor-pointer {{ $index === 0 ? 'bg-cyan-600' : 'bg-gray-300' }}"
                                data-index="{{ $index }}"
                                aria-label="Go to slide {{ $index + 1 }}"
                            ></button>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        {{-- project technologies --}}
        @if ($project->technologies->count() > 0)
            <div class="container">
                <h2 class="mb-4 text-3xl">Tech Stack:</h2>
                <ul class="grid gap-3 grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-10">
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
    </div>

</x-app-layout>
