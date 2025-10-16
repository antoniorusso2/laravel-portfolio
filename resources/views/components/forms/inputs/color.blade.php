@props(['value' => ''])
<input value="{{ $value }}" {{ $attributes->merge(['class' => 'rounded-md bg-transparent', 'name' => 'color', 'type' => 'color', 'id' => 'color']) }}>
