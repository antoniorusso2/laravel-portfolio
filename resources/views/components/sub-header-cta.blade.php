@props(['page' => 'index', 'route' => '', 'item', 'hasDelete' => false])

<?php
if ($hasDelete) {
    $modal_identifier = match ($item::class) {
        'App\Models\Project' => 'delete-project-',
        'App\Models\Media' => 'delete-media-',
    };
    $modal_identifier .= (string) $item->id;
}
?>

<section class="cta my-5">
    <div class="container">
        <div class="flex justify-between">
            @switch($page)
                @case('index')
                    <a class="btn special" href="{{ $route }}">
                        {{ $slot }}
                    </a>
                @break

                @case('edit')
                    <x-buttons.anchor href="{{ $item->getRoute('show') }}">
                        Indietro
                    </x-buttons.anchor>
                    {{-- delete --}}
                    <button
                        class="btn special delete md:ms-auto"
                        id="modal-trigger"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', '{{ $modal_identifier }}')"
                    >Elimina</button>
                @break

                @case('show')
                    <x-buttons.anchor href="{{ $item->getRoute('index') }}">
                        Indietro
                    </x-buttons.anchor>
                    {{-- delete --}}
                    <button
                        class="btn special delete md:ms-auto"
                        id="modal-trigger"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', '{{ $modal_identifier }}')"
                    >Elimina</button>
                @break

                @default
                    <div>
                        no sub-header content
                    </div>
                @break
            @endswitch
        </div>
    </div>
</section>
