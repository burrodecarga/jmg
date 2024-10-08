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


                                <i class="text-blue-500 cursor-pointer fa fa-book"
                                    title="{{ __('add lesson to section') }}"
                                    wire:click="addLesson({{ $item }})"></i>

                                {{-- <a href="{{ route('config_lesson', $item) }}">config</a> --}}
                            </div>
                        </header>
                    </div>
                </article>
                @foreach ($item->lessons as $l)
                    <article class="mx-10 mb-3 rounded-md card">
                        <div class="bg-blue-100 card-body">
                            <header class="flex items-center justify-between pl-3 font-bold">
                                {{ $l->name }}
                                <div class="flex items-center justify-center w-6 h-6 p-3 bg-blue-400 rounded-full">
                                    <a href="{{ route('config_lesson', $l->id) }} ">
                                        <i class="text-white cursor-pointer fa-solid fa-photo-film"
                                            title="{{ __('add resources') }}"></i></a>

                                </div>
                            </header>
                            <p class="pl-3 text-xs text-justify text-wrap max-w-['36rem']:">{{ $l->description }}</p>
                        </div>
                    </article>
                @endforeach
            @endforeach
        </ul>
    </article>
    @include('components.modales.editSectionModal')
    @include('components.modales.confirmSectionModal')
    @include('components.modales.addLessonModal')
</div>
