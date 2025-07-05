<x-app-layout>
    <div class="container">
        <div class="flex flex-wrap items-center justify-between">
            <div class="">
                <h2 class="text-capitalize my-4 fs-1">
                    Crea Linguaggio o Framework
                </h2>
            </div>
            <div class="col">
                <x-buttons.anchor href="{{ route('technologies.index') }}">
                    Indietro
                </x-buttons.anchor>
            </div>
        </div>
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

                <x-forms.form-field field="icon_url" label="Link esterno ad un'icona">
                    <x-forms.inputs.text />
                </x-forms.form-field>
                <x-forms.form-field field="icon" label="Carica un'icona personalizzata">
                    <x-forms.inputs.file />
                </x-forms.form-field>

                <x-forms.form-field field="color" label="Colore">
                    <x-forms.inputs.color />
                </x-forms.form-field>

                <button type="submit" class="btn btn-primary">Crea</button>
            </form>

        </div>
    </div>
</x-app-layout>
