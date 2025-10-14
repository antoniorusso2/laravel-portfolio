@props(['value' => ''])
<div>
    <input
        type="range"
        min="1"
        max="5"
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'rounded-md bg-transparent']) }}
    >
    <output>{{ $value }}</output>

    <script>
        const range = document.querySelector('input[type="range"]');
        const output = document.querySelector('output');

        range.addEventListener('input', () => {
            output.value = range.value;
        });
    </script>
</div>
