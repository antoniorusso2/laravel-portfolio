@props(['field' => null, 'label' => null])

<div {{ $attributes->merge(['class' => 'border border-gray-300 drop-shadow-lg flex w-full flex-wrap items-center dark:bg-slate-800 text-lg text-gray-900 drop-shadow-xl dark:text-white text-lg dark:border-gray-900  dark:text-white dark:bg-slate-800 w-full px-2 py-2 rounded-md']) }}>
    {{-- label --}}
    <x-forms.input-label class="my_label" for="{{ $field }}">
        {{ $label }}
    </x-forms.input-label>

    {{-- dynamic component --}}
    {{-- <x-dynamic-component
        :component="'forms.inputs.' . $type"
        :value="$field['value'] ?? old($field['name'])"
        :options="$field['options'] ?? []"
        :placeholder="$field['placeholder'] ?? ''"
        :label="$field['label']"
        name="{{ $field['name'] }}"
        class="{{ $field['class'] ?? '' }}"
    /> --}}

    {{ $slot }}

    {{-- error message --}}
    <x-forms.input-error class="mt-2" :messages="$errors->get($field)" />
</div>
