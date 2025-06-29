@props(['item' => null, 'type' => null, 'class' => ''])

<div x-data="{ fileName: '', imagePreview: null }" class="flex flex-col items-center gap-4">
    {{-- caricamento immagine --}}
    <label class="@error('image') border-red-500 @enderror relative flex h-48 w-48 cursor-pointer flex-col items-center justify-center overflow-hidden rounded-lg border-2 border-dashed border-gray-300 text-gray-500 transition hover:bg-gray-100">

        {{-- Se l'immagine è stata caricata --}}
        <template x-if="imagePreview">
            <img :src="imagePreview" class="absolute inset-0 h-full w-full rounded-lg object-cover" />
        </template>

        {{-- Se l'immagine non è stata caricata --}}
        <div x-show="!imagePreview" class="pointer-events-none flex flex-col items-center">
            <span class="text-5xl font-bold">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                    />
                </svg>
            </span>
            <span class="text-sm">Scegli immagine</span>
        </div>

        <input
            type="file"
            {{ $attributes->merge(['class' => 'hidden', 'name' => 'image']) }}
            @change="
        const file = $event.target.files[0];
        fileName = file?.name || '';
        imagePreview = file ? URL.createObjectURL(file) : null;
        "
        />
    </label>

    <!-- Nome del file -->
    <span x-text="fileName" class="max-w-xs truncate text-center text-sm text-gray-600"></span>

</div>
