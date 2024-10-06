<x-dialog-modal wire:model="openLesson" maxWidth='7xl'>
    <x-slot name="title">

    </x-slot>
    <x-slot name="content">
        <form wire:submit="saveLesson">
            @csrf
            <div class="grid grid-cols-2 gap-4 px-10 rounded bg-slate-50">
                <div class="">
                    <div class="mb-2">
                        <x-label class="my-2 italic text-left capitalize" value="{{ __('lesson of course') }}"
                            for="lesson" />
                        <x-input id="lesson" type="text" class="w-full my-2"
                            placeholder="{{ __('input lesson of course') }}" wire:model="lesson" />
                        <x-input-error for="lesson" class="text-left" />
                    </div>
                </div>
                <div class="">
                    <div class="mb-2">
                        <x-label class="my-2 italic text-left capitalize" value="{{ __('description of lesson') }}"
                            for="description" />
                        <textarea id="description" type="text" class="w-full rounded" placeholder="{{ __('input description of lesson') }}"
                            wire:model="description"></textarea>
                        <x-input-error for="description" class="text-left" />
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 px-10 py-4 my-3 rounded bg-slate-300">
                <div class="">
                    <div class="">
                        <div class="">
                            <x-label class="my-2 italic text-left capitalize" value="{{ __('PDF support of lesson') }}"
                                for="lesson" />
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="pdf" type="file" wire:model="pdf">
                        </div>
                        <x-input-error for="pdf" class="text-left" />
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class="">
                            <x-label class="my-2 italic text-left capitalize" value="{{ __('images of lesson') }}"
                                for="lesson" />
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="pdf" type="file" wire:model="image">
                        </div>
                    </div>
                </div>
                <div class="">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('video of lesson') }}"
                        for="lesson" />
                    <x-input id="lesson" type="text" class="w-full"
                        placeholder="{{ __('input lesson of course') }}" wire:model="lesson" />
                    <x-input-error for="lesson" class="text-left" />

                </div>
            </div>
            <button type="submit"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('create') }}
            </button>
            <button type="button" wire:click="$set('openLesson',false)"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                {{ __('cancel') }}
            </button>

        </form>


    </x-slot>
    <x-slot name="footer">

    </x-slot>
</x-dialog-modal>
