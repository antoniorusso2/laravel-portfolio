@props([
    'disabled' => false,
    'options' => [],
    'name' => '',
    'firstOption' => '',
    'selected' => false,
])

<select class="@error($name) border-red-500 @enderror border-2 rounded-md bg-slate-700 focus:outline-offset-1 focus:outline-indigo-400 focus:text-gray-900 dark:focus:bg-gray-50 dark:text-gray-50 w-full block p-2 " {{ $attributes->merge(['id' => $name, 'name' => $name]) }}>
    <option value="">{{ $firstOption }}</option>
    @foreach ($options as $option)
        <option value="{{ $option->id }}" @selected($option->id == $selected)>{{ __($option->name) }}</option>
    @endforeach

</select>
