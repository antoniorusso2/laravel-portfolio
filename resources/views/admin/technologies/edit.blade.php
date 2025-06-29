<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifica progetto') }}
        </h2>
    </x-slot>

    <section class="cta">
        <div class="container">
            <div class="flex justify-between">
                <a class="btn special" href="{{ route('technologies.index') }}">Indietro</a>

                {{-- delete --}}
                <button
                    class="btn special delete md:ms-auto"
                    id="modal-trigger"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-technology-deletion')"
                >Elimina</button>
            </div>
        </div>
    </section>

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
                {{-- old icon --}}

                <x-forms.form-field field="icon" label="Icona">
                    <x-forms.inputs.text name="icon" value="{{ old('icon', $technology->icon_url) }}" />
                    @if ($technology->icon_url)
                        <div class="img-wrap relative max-w-[300px] rounded-sm overflow-hidden py-4">
                            <img
                                src="{{ $technology->icon_url }}"
                                alt=" {{ $technology->name }} anteprima immagine"
                                class="w-full h-full object-cover object-center"
                            >
                        </div>
                    @endif
                </x-forms.form-field>

                {{-- color --}}
                <x-forms.form-field field="color" label="Colore">
                    <x-forms.inputs.color name="color" value="{{ old('color', $technology->color) }}" />
                </x-forms.form-field>

                <button class="btn special ms-auto" type="submit">Modifica</button>
            </form>
        </div>
    </section>

</x-app-layout>
