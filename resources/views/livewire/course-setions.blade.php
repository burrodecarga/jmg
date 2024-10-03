<div class="w-full col-span-1 p-2 border rounded border-1 bg-slate-200">

    <form wire:submit="addSection" class="grid items-center justify-between grid-cols-4 gap-1 my-3">
        @csrf
        <div class="col-span-3">
            <div class="">
                <div class="">
                    {{-- <x-label class="my-2 italic text-left capitalize" value="{{ __('section of course') }}"
                        for="course.section" /> --}}
                    <x-input type="text" name="section" class="w-full" placeholder="{{ __('input section of course') }}"
                        wire:model="section" />
                    <x-input-error for="section" />
                </div>
            </div>
        </div>

        <div class="items-end col-span-1">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('add section') }}
            </button>
        </div>

    </form>
    <article class="card">
        <div class="card-header">{{ __('sections') }} : {{ $sections->count() }}</div>

        <ul class="p-5 m-0 list-decimal bg-slate-100 ">

            @foreach ($sections as $item)
                <article class="mb-6 rounded-md card">
                    <div class="bg-gray-100 card-body">
                        <header class="flex items-center justify-between pl-3">
                            <li class="p-2 mt-1 text-left bg-white rounded-md grow"><strong>{{ __('section') }}</strong>
                                :
                                {{ $item->name }}</li>
                            <div class="gap-4 ml-2">

                                <i class="text-blue-500 cursor-pointer fa fa-edit" title="{{ __('edit section') }}"
                                    wire:click="edit({{ $item }})"></i>
                                <i class="text-red-500 cursor-pointer fa fa-eraser" title="{{ __('delete section') }}"
                                    wire:click="confirm({{ $item }})"></i>
                            </div>
                        </header>
                    </div>
                </article>
            @endforeach
        </ul>
    </article>
    @include('components.modales.editSectionModal')
    @include('components.modales.confirmSectionModal')
</div>
