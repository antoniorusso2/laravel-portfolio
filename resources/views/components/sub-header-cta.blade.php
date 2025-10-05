@props(['page' => 'index', 'route' => '', 'goBack' => 'dashboard', 'item' => null, 'hasDelete' => false])

<?php
if ($hasDelete) {
    $modal_identifier = match ($item::class) {
        'App\Models\Project' => 'delete-project-',
        'App\Models\Technology' => 'delete-technology-',
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

                    {{-- edit --}}
                    <x-buttons.anchor class="ms-3" href="{{ $item->getRoute('edit') }}">
                        Modifica
                    </x-buttons.anchor>
                    {{-- delete --}}
                    <button
                        class="btn special delete md:ms-auto"
                        id="modal-trigger"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', '{{ $modal_identifier }}')"
                    >Elimina</button>
                @break

                @case('create')
                    <x-buttons.anchor :href="route($goBack)">
                        Indietro
                    </x-buttons.anchor>
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
