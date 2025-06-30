@props(['item' => null, 'type' => null, 'class' => ''])

<div class="flex flex-wrap gap-3 {{ $class }}" x-data="{
    maxFiles: 5,
    files: [],
    previews: [],

    handleFileChange(index, event) {
        const file = event.target.files[0];
        if (!file) return;

        this.files[index] = file;

        if (file.type.startsWith('image/')) {
            this.previews[index] = { type: 'image', url: URL.createObjectURL(file) };
        } else if (file.type.startsWith('video/')) {
            this.previews[index] = { type: 'video', url: URL.createObjectURL(file) };
        }
    },

    removeFile(index) {
        this.files.splice(index, 1);
        this.previews.splice(index, 1);
    }
}">
    <template x-for="(preview, index) in Array.from({ length: maxFiles })" :key="index">
        <div x-show="index === 0 || files[index - 1]" class="mb-6 flex flex-col items-center gap-2">
            <!-- File preview -->
            <div class="relative h-48 w-48 overflow-hidden rounded-lg border-2 border-dashed border-gray-300">
                <template x-if="previews[index]">
                    <template x-if="previews[index].type === 'image'">
                        <img
                            :src="previews[index].url"
                            alt="Anteprima immagine"
                            class="h-full w-full object-cover"
                        />
                    </template>
                    <template x-if="previews[index].type === 'video'">
                        <video
                            :src="previews[index].url"
                            controls
                            class="h-full w-full object-cover"
                        ></video>
                    </template>
                </template>

                <template x-if="!previews[index]">
                    <!-- SVG "aggiungi file" cliccabile -->
                    <label :for="`file-${index}`" class="flex h-full w-full cursor-pointer flex-col items-center justify-center text-gray-400 transition hover:text-indigo-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-10 w-10"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>
                        <span class="text-sm">Aggiungi file</span>
                    </label>
                </template>

                <!-- Rimuovi file -->
                <button
                    type="button"
                    x-show="files[index]"
                    @click="removeFile(index)"
                    class="absolute top-1 right-1 rounded-full bg-red-600 p-1 text-white hover:bg-red-700"
                >
                    ✕
                </button>
            </div>

            <!-- Input file nascosto -->
            <input
                type="file"
                name="media[]"
                accept="image/*,video/*"
                class="hidden"
                :id="`file-${index}`"
                @change="handleFileChange(index, $event)"
            />

            <!-- Nome file -->
            <p class="text-sm text-gray-600 truncate w-48 text-center" x-text="files[index]?.name"></p>
        </div>
    </template>
</div>
