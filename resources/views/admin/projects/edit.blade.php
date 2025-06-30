<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifica progetto') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('projects.index') }}">Indietro</a>
                {{-- delete --}}
                <button
                    class="btn special delete md:ms-auto"
                    id="modal-trigger"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-project-deletion')"
                >Elimina</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('projects.update', $project) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome progetto">
                    <x-forms.inputs.text name="name" value="{{ old('name', $project->name) }}" />
                </x-forms.form-field>

                {{-- description --}}
                <x-forms.form-field field="description" label="Descrizione">
                    <x-forms.inputs.text name="description" value="{{ old('description', $project->description) }}" />
                </x-forms.form-field>

                {{-- image --}}
                <x-forms.form-field field="media" label="Immagine">
                    {{-- <div class="wrap relative flex flex-wrap gap-3">
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
                            <x-buttons.trash
                                name="media"
                                itemToDelete="media"
                                id="{{ $media->id }}"
                                :classes="'absolute top-0 right-0'"
                            />
                        @endforeach
                    </div> --}}

                    <div class="wrap relative flex flex-wrap gap-3">
                        @foreach ($project->media as $media)
                            <div class="relative w-48 h-auto">
                                @if ($media->type === 'image')
                                    <img src="{{ asset('storage/' . $media->url) }}" class="w-full h-auto object-cover rounded">
                                @elseif ($media->type === 'video')
                                    <video
                                        src="{{ asset('storage/' . $media->url) }}"
                                        controls
                                        class="w-full h-auto rounded"
                                    ></video>
                                @endif

                                {{-- Pulsante trash posizionato sopra --}}

                                <x-buttons.trash
                                    name="media"
                                    :type="'media'"
                                    :id="$media->id"
                                    :classes="'absolute top-2 right-2 z-10 hover:bg-red-500 hover:text-white transition-all p-1 rounded-full'"
                                />
                            </div>
                        @endforeach
                    </div>

                    <x-forms.inputs.file
                        id="media"
                        name="media[]"
                        value="{{ old('media', $project->media) }}"
                        multiple
                    />
                    <x-forms.input-error class="mt-2 w-full" :messages="$errors->get('media')" />
                </x-forms.form-field>

                {{-- types --}}
                <x-forms.form-field field="type_id" label="Tipologia">
                    <x-forms.inputs.select
                        name="type_id"
                        id="type_id"
                        :first-option="'Seleziona una tipologia'"
                        :selected="$project->type_id"
                        :options="$types"
                    />
                </x-forms.form-field>

                {{-- technologies --}}
                <x-forms.form-field field="technologies[]" label="Tecnologie">
                    <div class="flex flex-wrap gap-4">
                        @foreach ($technologies as $technology)
                            <x-forms.inputs.checkbox
                                name="technologies[]"
                                id="technologies-{{ $technology->id }}"
                                label-for="technologies-{{ $technology->id }}"
                                :item="$technology"
                                :checked="$project->technologies->contains($technology->id)"
                            />
                        @endforeach
                    </div>
                </x-forms.form-field>

                <x-forms.form-field field="customer" label="Cliente">
                    <x-forms.inputs.text name="customer" value="{{ old('customer', $project->customer) }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Modifica</button>
            </form>
        </div>

        @foreach ($project->media as $media)
            {{-- @dd($media->id); --}}
            <x-delete-modal
                :type="'media'"
                :action="route('media.destroy', $media->id)"
                :item="$media"
            />
        @endforeach
    </section>


</x-app-layout>
