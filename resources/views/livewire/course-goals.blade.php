<div class="w-full col-span-1 p-2 border rounded border-1 bg-slate-200">
    <h1 class="p-2 text-xl text-center text-white bg-blue-500 rounded-lg">
        {{ __('goals') }}
    </h1>
    <form wire:submit="addGoal">
        @csrf
        <div class="">
            <div class="col-span-1">
                <div class="mb-4">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('goal of course') }}"
                        for="course.goal" />
                    <x-input type="text" name="goal" class="w-full" placeholder="{{ __('input goal of course') }}"
                        wire:model="goal" />
                    <x-input-error for="goal" />
                </div>
            </div>
        </div>

        <div class="items-center justify-center">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('add goal') }}
            </button>
        </div>

    </form>
    <ul class="p-5 my-1 list-decimal bg-slate-100">

        @foreach ($goals as $item)
            <li class="p-2 mt-1 bg-white">{{ $item->name }}</li>
        @endforeach
    </ul>
</div>
