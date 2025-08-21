{{-- @dd($item::class) --}}

@php

@endphp

<div class="card p-4 border rounded-md min-h-56 flex flex-col">

    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ $item->name }}</h3>
    </div>
    <div class="card-body flex-grow flex flex-col items-start">
        <x-buttons.anchor :class="'mt-auto self-end'" :href="$item->getRoute('show')">
            Dettagli
        </x-buttons.anchor>

        {{-- {{ $item->getRoutes($item, 'show') }} </div> --}}
    </div>

</div>
