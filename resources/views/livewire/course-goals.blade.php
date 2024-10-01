<div class="w-full col-span-1 p-2 border rounded border-1 bg-slate-200">

    <form wire:submit="addGoal">
        @csrf
        <div class="">
            <div class="col-span-1">
                <div class="mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('goal of course') }}"
                        for="course.goal" />
                    <x-input type="text" name="goal" class="w-full" placeholder="{{ __('input goal of course') }}"
                        wire:model="goal" />
                    <x-input-error for="goal" />
                </div>
            </div>
        </div>

        <div class="items-center justify-center mb-4">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('add goal') }}
            </button>
        </div>

    </form>
    <article class="card">
        <ul class="p-5 m-0 list-decimal bg-slate-100 ">

            @foreach ($goals as $item)
                <article class="mb-6 rounded-md card">
                    <div class="bg-gray-100 card-body">
                        <header class="flex items-center justify-between pl-3">
                            <li class="p-2 mt-1 text-left bg-white rounded-md grow"><strong>{{ __('section') }}</strong>
                                :
                                {{ $item->name }}</li>
                            <div class="gap-4 ml-2">

                                <i class="text-blue-500 cursor-pointer fa fa-edit" title="{{ __('edit section') }}"></i>
                                <i class="text-red-500 cursor-pointer fa fa-eraser"
                                    title="{{ __('delete section') }}"></i>
                            </div>
                        </header>
                    </div>
                </article>
            @endforeach
        </ul>
</div>
