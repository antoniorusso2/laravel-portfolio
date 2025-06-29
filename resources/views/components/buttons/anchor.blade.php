@props(['class' => '', 'href' => '#'])

<a href="{{ $href }}" class="btn special border-gray-500 cursor-pointer {{ $class }}">
    {{ $text ?? $slot }}
</a>
