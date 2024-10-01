<div class="w-full col-span-1 p-2 border rounded border-1 bg-slate-200">

    <form wire:submit="addSection">
        @csrf
        <div class="">
            <div class="col-span-1">
                <div class="mb-4">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('section of course') }}"
                        for="course.section" />
                    <x-input type="text" name="section" class="w-full"
                        placeholder="{{ __('input section of course') }}" wire:model="section" />
                    <x-input-error for="section" />
                </div>
            </div>
        </div>

        <div class="items-center justify-center">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('add section') }}
            </button>
        </div>

    </form>
    <ul class="p-5 my-1 list-decimal bg-slate-100">

        @foreach ($sections as $item)
            <li class="p-2 mt-1 bg-white">{{ $item->name }}</li>
        @endforeach
    </ul>
</div>
