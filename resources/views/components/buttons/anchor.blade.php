<a {{ $attributes->merge(['class' => 'btn special border-gray-500 cursor-pointer', 'href' => '']) }}>
    {{ $text ?? $slot }}
</a>
