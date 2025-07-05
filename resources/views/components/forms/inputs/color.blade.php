@props(['value' => ''])
<input value="{{ $value }}" {{ $attributes->merge(['class' => 'rounded-md bg-transparent', 'type' => 'color', 'id' => 'color']) }}>
