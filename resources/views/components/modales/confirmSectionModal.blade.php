<x-dialog-modal wire:model="openConfirm">
    <x-slot name="title">

    </x-slot>
    <x-slot name="content">
        <form wire:submit="delete">
            @csrf
            <div class="">
                <div class="col-span-1">
                    <div class="mb-4">
                        <x-label class="my-2 italic text-left capitalize" value="{{ __('section of course') }}"
                            for="section" />
                        <x-input id="section" type="text" class="w-full"
                            placeholder="{{ __('input section of course') }}" wire:model="section" readOnly />
                        <x-input-error for="section" class="text-left" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2">
                <button type="submit"
                    class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    {{ __('delete') }}
                </button>
                <button type="button" wire:click="$set('openConfirm',false)"
                    class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                    {{ __('cancel') }}
                </button>
            </div>
        </form>

    </x-slot>
    <x-slot name="footer">

    </x-slot>
</x-dialog-modal>
