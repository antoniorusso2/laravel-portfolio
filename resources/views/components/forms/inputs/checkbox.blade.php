@props(['item' => null, 'checked' => false, 'labelFor' => 'item'])
<div class="flex items-center">
    <input
        @checked($checked)
        type="checkbox"
        {{ $attributes->merge(['class' => 'h-4 w-4 text-indigo-600 focus:ring-indigo-500', 'id' => $item->id, 'value' => $item->id]) }}
    >
    <label class="ms-2" for="{{ $labelFor }}">{{ $item->name }}</label>
</div>
