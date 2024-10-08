<x-dialog-modal wire:model="openImageModal" maxWidth='2xl'>
    <x-slot name="title">
        <h1 class="text-sm uppercase">{{ __('add IMAGE to lesson') }} {{ $lesson->name }}</h1>
    </x-slot>
    <x-slot name="content">
        <form wire:submit="addImage">
            @csrf
            <div class="flex-grow mb-2">
                <x-label class="my-2 italic text-left capitalize" value="{{ __('name of image') }}" for="name" />
                <x-input id="name" type="text" class="w-full my-2" placeholder="{{ __('input name of image') }}"
                    wire:model="name" />
                <x-input-error for="name" class="text-left" />
            </div>
            <div class="flex-grow mb-2">
                <x-label class="my-2 italic text-left capitalize" value="{{ __('description of image') }}"
                    for="description" />
                <textarea id="description" type="text" class="w-full my-2" placeholder="{{ __('input description of image') }}"
                    wire:model="description"></textarea>
                <x-input-error for="description" class="text-left" />
            </div>

            <div class="flex justify-between gap-4">
                <div class="px-10 py-4 my-3 rounded bg-slate-50">
                    <div class="">
                        <div class="">
                            <div class="">
                                <x-label class="my-2 italic text-left capitalize"
                                    value="{{ __('IMAGE support of lesson') }}" for="image" />
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="image" type="file" wire:model="image">
                            </div>
                            <x-input-error for="image" class="text-left" />
                        </div>
                    </div>
                </div>
                <div>
                    @if ($image)
                        Photo Preview:
                        <img src="{{ $image->temporaryUrl() }}" class="object-cover w-48 h-48">
                    @endif
                </div>
            </div>
            <button type="submit"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('create') }}
            </button>
            <button type="button" wire:click="$set('openImageModal',false)"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                {{ __('cancel') }}
            </button>

        </form>
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-dialog-modal>
