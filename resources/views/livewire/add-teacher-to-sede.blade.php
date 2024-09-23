<div class="w-full mx-auto overflow-hidden overflow-x-auto border rounded-md border-neutral-500 dark:border-neutral-700">
    <div class="px-10 pt-4 pb-0 mb-0">
        <form id="uno"wire:submit='addTeacher' class="w-1/2 ml-auto">
            <div class="mb-1">
                <x-input type="text" autocomplete="off" required name="name" class="w-full"
                    placeholder="{{ __('input cedula of selected') }}" wire:model='cedula' />
                <x-input-error for="cedula" />
            </div>
            <x-button
                class="w-full bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{ __('add teacher') }}
            </x-button>

        </form>
        {{-- <form class="bg-blue-100 cols span-1">
            <div class="mb-1">
                <x-input type="text" required name="name" class="w-full"
                    placeholder="{{ __('input cedula of selected') }}" wire:model='cedula' />
                <x-input-error for="cedula" />
            </div>
            <x-button
                class="type='submit' w-full bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{ __('delete manager') }}
            </x-button>

            <div wire:loading>processing...</div>
        </form> --}}
    </div>

    <div class="w-full p-6">
        <h1 class="font-semibold text-center col-span-full">Profesores disponibles en sede</h1>
        <h1 class="font-semibold text-center col-span-full">Total de Profesores : {{ $teachers->count() }}
        </h1>
        <table class="w-full text-sm text-left border border-gray-200 rounded text-neutral-600 dark:text-neutral-300">
            <thead
                class="text-sm border-b border-neutral-300 bg-neutral-50 text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">{{ __('teacher') }} </th>
                    <th scope="col" class="p-4">{{ __('cedula') }} </th>
                    <th scope="col" class="p-4 text-center">{{ __('actions') }} </th>

                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                @foreach ($teachers as $teacher)
                    <tr>
                        <td class="p-4">{{ $teacher->full_name }} </td>
                        <td class="p-4">{{ $teacher->cedula }} </td>
                        <td class="p-4">
                            <a href="#" wire:click="del({{ $teacher->id }})" class="text-white cursor-pointer "
                                title="{{ __('del teacher of sede') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="mx-auto text-red-600 size-6">
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
