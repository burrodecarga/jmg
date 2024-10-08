<x-dialog-modal wire:model="openPdfModal" maxWidth='2xl'>
    <x-slot name="title">
        <h1 class="text-sm uppercase">{{ __('add PDF to lesson') }} {{ $lesson->name }}</h1>
    </x-slot>
    <x-slot name="content">
        <form wire:submit="addPdf">
            @csrf

            <div class="px-10 py-4 my-3 rounded bg-slate-300">
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
