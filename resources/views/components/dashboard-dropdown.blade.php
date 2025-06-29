@props(['list' => [], 'type' => null, 'name' => null, 'textClasses' => ''])

@php

    $routes = [
        'projects' => [
            'index' => 'projects.index',
            'show' => 'projects.show',
            'edit' => 'projects.edit',
        ],
        'technologies' => [
            'index' => 'technologies.index',
            'show' => 'technologies.show',
            'edit' => 'technologies.edit',
        ],
        'types' => [
            'index' => 'types.index',
            'show' => 'types.show',
            'edit' => 'types.edit',
        ],
    ];
@endphp

<div class="mb-4 cursor-pointer bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
    <x-dropdown
        align="right"
        width="full"
        align="dashboard"
    >
        <x-slot name="trigger">
            <div class="trigger flex items-center justify-between rounded-md bg-white text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                <button class="border border-transparent px-3 py-2">
                    <div>{{ $name }}</div>
                </button>

                <div class="ms-auto p-4">
                    <svg
                        class="h-4 w-4 fill-current"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            <ul class="max-h-64 overflow-y-auto px-1">
                @foreach ($list as $item)
                    <li class="flex items-center justify-between border-b border-gray-500">
                        {{-- link to show --}}
                        <x-dropdown-link :href="route($routes[$type]['show'], $item)" class="{{ $textClasses }}">{{ $item->name }}</x-dropdown-link>

                        <div class="cta ms-auto flex">
                            {{-- link to edit --}}
                            <x-dropdown-link :href="route($routes[$type]['edit'], $item)" class="me-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                                    />
                                </svg>
                            </x-dropdown-link>
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-slot>
    </x-dropdown>
</div>
