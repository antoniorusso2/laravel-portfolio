@props(['field' => null, 'label' => null])

<div {{ $attributes->merge(['class' => 'form_section flex w-full flex-wrap items-center rounded-md bg-slate-800 px-4 py-2 text-lg text-gray-900 drop-shadow-xl dark:text-white']) }}>
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
