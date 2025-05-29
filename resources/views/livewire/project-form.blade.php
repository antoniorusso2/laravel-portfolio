<form
    action="{{ route('projects.update', $project) }}"
    method="POST"
    class="w-75 mx-auto"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    <x-forms.form-field>
        <x-forms.input-label for="name">Nome del progetto</x-label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ $project->name }}"
            >
    </x-forms.form-field>

    {{-- media --}}
    <x-forms.form-field>

        <x-forms.input-label for="media[]">Carica immagini</x-label>

            <x-forms.inputs.file
                wire:model="media_upload"
                multiple
                class="mb-3"
                id="media[]"
                name="media[]"
            />

            {{-- new media --}}
            <div class="row mt-2">
                @foreach ($media_upload as $index => $temp)
                    @if ($temp)
                        <div class="col-md-3 mb-2 position-relative">
                            <img src="{{ $temp->temporaryUrl() }}" class="img-fluid rounded">
                            <button
                                type="button"
                                class="btn btn-danger btn-sm py-0 my-1 me-1 position-absolute top-0 end-0 bg-danger"
                                wire:click="deleteMedia({{ $index }})"
                            >X</button>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- old media --}}
            @if ($project->media->count() > 0)
                <div class="prev_img d-flex row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 flex-wrap my-3 border rounded">
                    @foreach ($project->media as $media)
                        <div class="position-relative p-2">
                            <img
                                src="{{ asset('storage/' . $media->url) }}"
                                alt=""
                                class="img-fluid d-block rounded-2"
                            >

                            {{-- x icon for delete img --}}


                            <x-ui.trash-icon :type="'media'" :media="$media" />

                        </div>
                    @endforeach
                </div>
            @endif
    </x-forms.form-field>

    {{-- type --}}
    <x-forms.form-field>
        <x-forms.input-label for="type">Tipologia progetto</x-label>
            <select
                class="form-select"
                name="type_id"
                id="type"
            >
                {{-- type select --}}
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
    </x-forms.form-field>

    {{-- technologies --}}
    <x-forms.form-field class="d-flex flex-wrap column-gap-3">
        <x-forms.input-label class="text-capitalize fw-bold fs-4 col-12" for="technologies">Tecnologie</x-label>
            {{-- checkboxes --}}
            @foreach ($technologies as $technology)
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value="{{ $technology->id }}"
                        name="{{ $technology->name }}"
                        id="{{ $technology->name }}"
                        {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="{{ $technology->name }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
    </x-forms.form-field>

    {{-- customer --}}
    <x-forms.form-field>
        <label for="customer" class="form-label">Cliente</label>
        <input
            type="text"
            class="form-control"
            id="customer"
            name="customer"
            value="{{ $project->customer }}"
        >
    </x-forms.form-field>

    {{-- description --}}
    <x-forms.form-field>
        <label class="form-label" for="description">Descrizione</label>
        <textarea
            class="form-control w-100"
            name="description"
            id="description"
            cols="30"
            rows="3"
        >{{ $project->description }}</textarea>
    </x-forms.form-field>

    {{-- submit --}}
    <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>
