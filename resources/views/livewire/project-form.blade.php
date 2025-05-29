<form
    action="{{ route('projects.update', $project) }}"
    method="POST"
    class="w-50 mx-auto"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome del progetto</label>
        <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            value="{{ $project->name }}"
        >
    </div>

    {{-- media --}}
    <div class="mb-3">
        @if ($project->media->count() > 0)
            <div class="prev_img d-flex gap-2">
                @foreach ($project->media as $media)
                    <div class="img-wrap position-relative d-inline-block">
                        <img
                            src="{{ asset('storage/' . $media->url) }}"
                            alt=""
                            class="w-full img-fluid rounded-2"
                        >

                        {{-- x icon for delete img --}}

                        <x-buttons.delete-btn :type="'media'" :media="$media" />
                    </div>
                @endforeach
            </div>
        @endif
        <label for="image" class="form-label col-12">Immagine</label>

        <x-forms.inputs.file
            wire:model="media_upload"
            multiple
            class="mb-3"
            id="media[]"
            name="media[]"
        />

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
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
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
    </div>

    {{-- technologies --}}
    <div class="mb-3 d-flex flex-wrap column-gap-3">
        <label
            class="form-label w-100"
            for="technologies"
            class="form-label"
        >Linguaggi e Framework</label>
        {{-- checkboxes --}}
        @foreach ($technologies as $technology)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="{{ $technology->id }}"
                    name="technologies[]"
                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                >
                <label class="form-check-label" for="technologies">
                    {{ $technology->name }}
                </label>
            </div>
        @endforeach
    </div>

    <div class="mb-3">
        <label for="customer" class="form-label">Cliente</label>
        <input
            type="text"
            class="form-control"
            id="customer"
            name="customer"
            value="{{ $project->customer }}"
        >
    </div>
    <div class="mb-3">
        <label class="form-label" for="description">Descrizione</label>
        <textarea
            class="form-control w-100"
            name="description"
            id="description"
            cols="30"
            rows="3"
        >{{ $project->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>
