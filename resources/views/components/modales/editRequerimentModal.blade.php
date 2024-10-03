<x-dialog-modal wire:model="open">
    <x-slot name="title">

    </x-slot>
    <x-slot name="content">
        <form wire:submit="update">
            @csrf
            <div class="">
                <div class="col-span-1">
                    <div class="mb-4">
                        <x-label class="my-2 italic text-left capitalize" value="{{ __('requeriment of course') }}"
                            for="requeriment" />
                        <x-input name="requeriment" type="text" class="w-full"
                            placeholder="{{ __('input requeriment of course') }}" wire:model="requeriment" />
                        <x-input-error for="requeriment" class="text-left" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-2">
                <button type="submit"
                    class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    {{ __('modify') }}
                </button>
                <button type="button" wire:click="$set('open',false)"
                    class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                    {{ __('cancel') }}
                </button>
            </div>
        </form>

    </x-slot>
    <x-slot name="footer">

    </x-slot>
</x-dialog-modal>
