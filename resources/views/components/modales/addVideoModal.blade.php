<x-dialog-modal wire:model="openVideoModal" maxWidth='2xl'>
    <x-slot name="title">
        <h1 class="text-sm uppercase">{{ __('add video to lesson') }} {{ $lesson->name }}</h1>
    </x-slot>
    <x-slot name="content">
        <form wire:submit="addVideo">
            @csrf

            <div class="flex-grow mb-2">
                <x-label class="my-2 italic text-left capitalize" value="{{ __('name of video') }}" for="name" />
                <x-input id="name" type="text" class="w-full my-2" placeholder="{{ __('input name of video') }}"
                    wire:model="name" />
                <x-input-error for="name" class="text-left" />
            </div>
            <div class="flex gap-1">

                <div class="flex-grow mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('iframe of video') }}"
                        for="iframe" />
                    <x-input id="iframe" type="text" class="w-full my-2"
                        placeholder="{{ __('input iframe of video') }}" wire:model="iframe" />
                    <x-input-error for="iframe" class="text-left" />
                </div>

                <div class="flex-grow-0 mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('platform of video') }}"
                        for="platform" />
                    <select id="platform" type="text" class="w-full my-2 rounded"
                        placeholder="{{ __('input platform of video') }}" wire:model="platform">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="platform" class="text-left" />
                </div>
            </div>



            <button type="submit"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('create') }}
            </button>
            <button type="button" wire:click="$set('openVideoModal',false)"
                class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                {{ __('cancel') }}
            </button>

        </form>
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-dialog-modal>
