<div class="w-full overflow-hidden overflow-x-auto border rounded-md border-neutral-300 dark:border-neutral-700">

    <div class="grid w-full grid-cols-2 gap-3 p-6 mx-auto md:grid-cols-2">
        <h1 class="font-semibold text-center col-span-full">Grados y Secciones disponibles en sede</h1>
        <h1 class="font-semibold text-center col-span-full">Total de Grados y Secciones : {{ $grados_de_sede->count() }}
        </h1>
        <table class="w-full text-sm text-left border border-gray-200 rounded text-neutral-600 dark:text-neutral-300">
            <thead
                class="text-sm border-b border-neutral-300 bg-neutral-50 text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">{{ __('grado') }} </th>
                    <th scope="col" class="p-4">Name</th>

                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @foreach ($grados as $grado)
                    <tr>
                        <td class="p-4">{{ $grado->full_name }} </td>
                        <td class="p-4">
                            <a href="#" wire:click="add({{ $grado->id }})" class="text-white cursor-pointer"
                                title="{{ __('add secction to course') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="w-full text-sm text-left border border-gray-200 rounded text-neutral-600 dark:text-neutral-300">
            <thead
                class="text-sm border-b border-neutral-300 bg-neutral-50 text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">{{ __('grado') }} </th>
                    <th scope="col" class="p-4">{{ __('number') }} </th>
                    <th scope="col" class="p-4">{{ __('section') }} </th>
                    <th scope="col" class="p-4">{{ __('actions') }}</th>

                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @foreach ($grados_de_sede as $grado)
                    <tr>
                        <td class="p-4">{{ $grado->full_name }} </td>
                        <td class="p-4">{{ $grado->pivot->numero }} </td>
                        <td class="p-4">{{ $grado->pivot->letra }} </td>
                        <td class="p-4">
                            <a wire:click="del({{ $grado->id }})" class="text-white cursor-pointer"
                                title="{{ __('del secction to course') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="text-red-600 size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
