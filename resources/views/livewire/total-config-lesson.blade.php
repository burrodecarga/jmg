<div class="w-full p-5 border rounded border-1 bg-slate-200">
    <form wire:submit="saveLesson" class="">
        @csrf
        <div class="grid grid-cols-1 gap-1 px-10 mb-2 rounded bg-slate-50">
            <div class="">
                <div class="mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('lesson of section') }}"
                        for="name" />
                    <x-input id="name" name="name" type="text" class="w-full my-2 text-sm"
                        placeholder="{{ __('input lesson of section') }}" wire:model="name" />
                    <x-input-error for="name" class="text-left" />
                </div>
            </div>
            <div class="">
                <div class="mb-2">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('description of lesson') }}"
                        for="description" />
                    <textarea id="description" type="text" class="w-full h-auto text-sm rounded" rows="5"
                        placeholder="{{ __('input description of lesson') }}" wire:model="description"></textarea>
                    <x-input-error for="description" class="text-left" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            {{ __('modify') }}
        </button>
    </form>
</div>
