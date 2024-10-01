<div class="w-full col-span-1 p-2 border rounded border-1 bg-slate-200">
    <div x-data="{ open: false }">
        <a x-show="!open" x-on:click="open=true" class="flex items-center no-underline cursor-pointer">
            <i class="mr-3 text-2xl text-blue-500 fa-regular fa-plus-square" title="{{ __('add requeriment') }}"></i>
            {{ __('add requeriment') }}
        </a>
        <article class="h-100 card" x-show="open">
            <div class="bg-gray-100 card-body">
                <h1 class="text-xl font-bold">{{ __('add new requeriment') }}</h1>
                <form wire:submit="addRequeriment">
                    @csrf
                    <div class="">
                        <div class="col-span-1">
                            <div class="mb-4">
                                <x-label class="my-2 italic text-left capitalize"
                                    value="{{ __('requeriment of course') }}" for="course.requeriment" />
                                <x-input type="text" name="requeriment" class="w-full"
                                    placeholder="{{ __('input requeriment of course') }}" wire:model="requeriment" />
                                <x-input-error for="requeriment" class="text-left" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        <button type="submit"
                            class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                            {{ __('add') }}
                        </button>
                        <button type="button" x-on:click="open=false"
                            class="px-3 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-800">
                            {{ __('cancel') }}
                        </button>
                    </div>
                </form>
            </div>
        </article>
    </div>
    <ul class="p-5 my-1 list-decimal bg-slate-100">

        @foreach ($requeriments as $item)
            <li class="p-2 mt-1 bg-white">{{ $item->name }}</li>
        @endforeach
    </ul>

    {{-- <form wire:submit="addRequeriment">
        @csrf
        <div class="">
            <div class="col-span-1">
                <div class="mb-4">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('requeriment of course') }}"
                        for="course.requeriment" />
                    <x-input type="text" name="requeriment" class="w-full"
                        placeholder="{{ __('input requeriment of course') }}" wire:model="requeriment" />
                    <x-input-error for="requeriment" />
                </div>
            </div>
        </div>

        <div class="items-center justify-center">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('add requeriment') }}
            </button>
        </div>

    </form>
   --}}
</div>
