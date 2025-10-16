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

                <x-forms.form-field field="icon_external_url" label="Icona">
                    <x-forms.inputs.text name="icon_external_url" value="{{ old('icon', $technology->icon_external_url) }}" />
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
