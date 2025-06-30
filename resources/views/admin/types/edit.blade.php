<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifica tipologia') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('types.index') }}">Indietro</a>

                {{-- delete --}}
                <button
                    class="btn special delete md:ms-auto"
                    id="modal-trigger"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'delete-type-{{ $type->id }}')"
                >Elimina</button>
            </div>
        </div>
    </section>

    <section class="modify_form">
        <div class="container">
            <form
                class="mx-auto flex w-full flex-col items-start justify-center gap-4"
                action="{{ route('types.update', $type) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- name --}}
                <x-forms.form-field field="name" label="Nome progetto">
                    <x-forms.inputs.text name="name" value="{{ old('name', $type->name) }}" />
                </x-forms.form-field>

                {{-- description --}}
                <x-forms.form-field field="description" label="Descrizione">
                    <x-forms.inputs.text name="description" value="{{ old('description', $type->description) }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Modifica</button>
            </form>
        </div>

        {{-- modals --}}
        <x-delete-modal
            :type="'type'"
            :item="$type"
            :action="route('types.destroy', $type)"
        />
    </section>
</x-app-layout>
