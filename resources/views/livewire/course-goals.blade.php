<div class="w-full col-span-1 p-2 border rounded border-1 bg-slate-200">

    <form wire:submit="addGoal" class="grid items-center justify-between grid-cols-4 gap-1 my-3">
        @csrf
        <div class="col-span-3">
            <div class="">
                <div class="">
                    {{-- <x-label class="flex-1 my-2 italic text-left capitalize " value="{{ __('goal of course') }}"
                        for="goal" /> --}}
                    <x-input type="text" name="goal" class="w-full" placeholder="{{ __('input goal of course') }}"
                        wire:model="goal" />
                    <x-input-error for="goal" />
                </div>
            </div>
        </div>

        <div class="items-end col-span-1">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('add goal') }}
            </button>
        </div>

    </form>
    <article class="card">
        <div class="card-header">{{ __('goals') }} : {{ $goals->count() }}</div>

        <ul class="p-5 m-0 list-decimal bg-slate-100 ">

            @foreach ($goals as $item)
                <article class="mb-6 rounded-md card">
                    <div class="bg-gray-100 card-body">
                        <header class="flex items-center justify-between pl-3">
                            <li class="p-2 mt-1 text-left bg-white rounded-md grow"><strong>{{ __('goal') }}</strong>
                                :
                                {{ $item->name }}</li>
                            <div class="gap-4 ml-2">

                                <i class="text-blue-500 cursor-pointer fa fa-edit" title="{{ __('edit goal') }}"
                                    wire:click="edit({{ $item }})"></i>
                                <i class="text-red-500 cursor-pointer fa fa-eraser" title="{{ __('delete goal') }}"
                                    wire:click="confirm({{ $item }})"></i>
                            </div>
                        </header>
                    </div>
                </article>
            @endforeach
        </ul>
    </article>
    @include('components.modales.editGoalModal')
    @include('components.modales.confirmGoalModal')
</div>
