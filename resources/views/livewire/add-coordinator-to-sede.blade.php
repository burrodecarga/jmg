<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <form id="uno"wire:submit='addCoordinator' class="bg-blue-100 cols span-1">
            <div class="mb-1">
                <x-input type="text" autocomplete="off" required name="name" class="w-full"
                    placeholder="{{ __('input cedula of selected') }}" wire:model='cedula' />
                <x-input-error for="cedula" />
            </div>
            <x-button
                class="w-full bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{ __('add coordinator') }}
            </x-button>

        </form>
        <form wire:submit='delCoordinator' class="bg-blue-100 cols span-1">
            <div class="mb-1">
                <x-input type="text" required name="name" class="w-full"
                    placeholder="{{ __('input cedula of selected') }}" wire:model='cedula' />
                <x-input-error for="cedula" />
            </div>
            <x-button
                class="type='submit' w-full bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{ __('delete coordinator') }}
            </x-button>
        </form>
    </div>
    <span wire:loading>processing...</span>
    <div class="w-full px-5 py-3 bg-white">
        <p class="p-2 m-0 text-sm font-medium bg-slate-100">{{ __('selected coordinator') }}
        </p>
        @foreach ($coordinators as $m)
            <p class="m-0 text-sm font-medium">
                {{ $m->name . '  ' . $m->last_name . ':   C.I.: ' . $m->cedula }}</p>
        @endforeach
    </div>
</div>
