<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifica progetto') }}
        </h2>
    </x-slot>

    <x-sub-header-cta
        :page="'edit'"
        :item="$technology"
        :hasDelete="true"
    />

    <section class="modify_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('technologies.update', $technology) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome progetto">
                    <x-forms.inputs.text name="name" value="{{ old('name', $technology->name) }}" />
                </x-forms.form-field>

                {{-- icon --}}

                <x-forms.form-field field="icon" label="Icona">
                    <x-forms.inputs.text name="icon" value="{{ old('icon', $technology->icon) }}" />
                    @if ($technology->icon)
                        <div class="img-wrap relative max-w-[300px] rounded-sm overflow-hidden py-4">
                            <img
                                src="{{ $technology->icon }}"
                                alt=" {{ $technology->name }} anteprima immagine"
                                class="w-full h-full object-cover object-center"
                            >
                        </div>
                    @elseif ($technology->icon_external_url)
                        {{-- TODO: add trash can delete icon  --}}
                        <div class="">
                            <img
                                src="{{ $technology->icon_external_url }}"
                                alt=" {{ $technology->name }} anteprima immagine"
                                class="w-full h-full object-cover object-center"
                            >
                        </div>
                    @endif
                </x-forms.form-field>

                {{-- skill level --}}

                <x-forms.form-field field="level" label="Livello di competenza">
                    <x-forms.inputs.range
                        name="level"
                        id="level"
                        value="{{ old('level', $technology->level) }}"
                        min="1"
                        max="5"
                    />
                </x-forms.form-field>

                {{-- color --}}
                <x-forms.form-field field="color" label="Colore">
                    <x-forms.inputs.color name="color" value="{{ old('color', $technology->color) }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Modifica</button>
            </form>
        </div>

        {{-- modals --}}
        <x-delete-modal
            :type="'technology'"
            :item="$technology"
            action="{{ route('technologies.destroy', $technology) }}"
        />
    </section>

</x-app-layout>
