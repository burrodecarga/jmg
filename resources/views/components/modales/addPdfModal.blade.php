<x-dialog-modal wire:model="openPdfModal" maxWidth='2xl' enctype="multipart/form-data">
    <x-slot name="title">
        <h1 class="text-sm uppercase">{{ __('add PDF to lesson') }} {{ $lesson->name }}</h1>
    </x-slot>
    <x-slot name="content">
        <form wire:submit="addPdf">
            @csrf
            @method('POST')
            <div class="flex-grow mb-2">
                <x-label class="my-2 italic text-left capitalize" value="{{ __('title of book') }}" for="title" />
                <x-input id="title" type="text" class="w-full my-2"
                    placeholder="{{ __('input title of course') }}" wire:model="title" />
                <x-input-error for="title" class="text-left" />
            </div>
            <div class="flex gap-3">
                <div class="flex-grow mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('author of book') }}"
                        for="author" />
                    <x-input id="author" type="text" class="w-full my-2"
                        placeholder="{{ __('input author of course') }}" wire:model="author" />
                    <x-input-error for="author" class="text-left" />
                </div>
                <div class="flex-grow-0 mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('Number of pages') }}"
                        for="pages" />
                    <x-input id="pages" type="number" class="w-full my-2"
                        placeholder="{{ __('input pages of book') }}" wire:model="pages" min="1" />
                    <x-input-error for="pages" class="text-left" />
                </div>
            </div>

            <div class="px-10 py-4 my-3 rounded bg-slate-50">
                <div class="">
                    <div class="">
                        <div class="">
                            <x-label class="my-2 italic text-left capitalize" value="{{ __('PDF support of lesson') }}"
                                for="pdf" />
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="pdf" type="file" wire:model="pdf">
                        </div>
                        <x-input-error for="pdf" class="text-left" />
                    </div>
                </div>
            </div>
            <button type="submit"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('create') }}
            </button>
            <button type="button" wire:click="$set('openPdfModal',false)"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                {{ __('cancel') }}
            </button>

        </form>
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-dialog-modal>
