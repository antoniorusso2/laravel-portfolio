<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aggiungi una nuova tecnologia') }}
        </h2>
    </x-slot>

    <x-sub-header-cta page="create" goBack="technologies.index" />
    <div class="container">
        <form
            class="mx-auto flex w-full flex-col items-start justify-center gap-4"
            action="{{ route('technologies.store') }}"
            method="POST"
        >
            @csrf
            <x-forms.form-field field="name" label="Tecnologia">
                <x-forms.inputs.text name="name" value="{{ old('name', '') }}" />
            </x-forms.form-field>

            <x-forms.form-field field="icon_external_url" label="Link esterno ad un'icona">
                <x-forms.inputs.text />
            </x-forms.form-field>
            <x-forms.form-field field="icon" label="Carica un'icona personalizzata">
                <x-forms.inputs.file />
            </x-forms.form-field>

            <x-forms.form-field field="color" label="Colore">
                <x-forms.inputs.color value="" />
            </x-forms.form-field>

            <button type="submit" class="btn btn-primary">Crea</button>
        </form>

    </div>
    </div>
</x-app-layout>
