<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crea nuovo progetto') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('projects.index') }}">Indietro</a>
            </div>
        </div>
    </section>

    <section class="create_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('projects.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('POST')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome piatto">
                    <x-forms.inputs.text name="name" value="{{ old('name', '') }}" />
                </x-forms.form-field>

                {{-- description --}}
                <x-forms.form-field field="description" label="Descrizione">
                    <x-forms.inputs.text name="description" value="{{ old('description', '') }}" />
                </x-forms.form-field>

                {{-- TODO add media managing --}}

                {{-- technologies --}}
                <x-forms.form-field field="technologies[]" label="Tecnologie utilizzate">
                    @foreach ($technologies as $technology)
                        <x-forms.inputs.checkbox
                            name="technologies[]"
                            value="{{ $technology->id }}"
                            id="technology-{{ $technology->id }}"
                            labelFor="technology-{{ $technology->id }}"
                            :item="$technology"
                            :checked="old('technologies') && in_array($technology->id, old('technologies'))"
                        />
                    @endforeach
                </x-forms.form-field>

                {{-- type --}}
                <x-forms.form-field field="type" label="Tipologia progetto">
                    <x-forms.inputs.select
                        name="type_id"
                        id="type_id"
                        :first-option="'Seleziona una categoria'"
                        :options="$categories"
                        :selected="old('type_id')"
                    />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Crea</button>
            </form>
        </div>
    </section>

</x-app-layout>
