@props([
    'disabled' => false,
    'name' => '',
])

@php
    $basicClasses = 'border-2 rounded-md bg-slate-700 focus:outline-offset-1 focus:outline-indigo-400 focus:text-gray-900 dark:focus:bg-gray-50 dark:text-gray-50 w-full block p-2 ';
@endphp

<input
    @disabled($disabled)
    class="@error($name) border-red-500 @enderror {{ $basicClasses }}"
    {{ $attributes->merge(['name' => $name, 'id' => $name, 'type' => 'text']) }}
>
