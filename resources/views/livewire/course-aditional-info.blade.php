<div class="w-full col-span-1 p-2 border rounded bg-slate-200 border-1">
    <form wire:submit="modify">
        @csrf
        <div class="">
            <div class="col-span-1">
                <div class="mb-4">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('name of course') }}" for="name" />
                    <x-input id="name" type="text" name="name" class="w-full"
                        placeholder="{{ __('input name of course') }}" wire:model="name" readonly autocomplete="off" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('subtitle of course') }}"
                        for="subtitle" />
                    <x-input id="subtitle" type="text" name="subtitle" class="w-full"
                        placeholder="{{ __('input subtitle of course') }}" wire:model="subtitle" />
                    <x-input-error for="subtitle" />
                </div>

                <div class="mb-4">
                    <x-label class="my-2 italic text-left capitalize" value="{{ __('description of course') }}"
                        for="description" />
                    <textarea id="description" name="description" class="w-full" placeholder="{{ __('input description of course') }}"
                        wire:model="description"></textarea>
                    <x-input-error for="description" />
                </div>
                <div class="flex gap-4">
                    <div class="mb-4 grow">
                        <x-label class="my-2 italic text-left capitalize" value="{{ __('level of course') }}"
                            for="level" />
                        <select id="level" name="level" id="level" class="w-full bg-gray-100 rounded">
                            <option value="" wire:model="level_id">
                                {{ __('no level') }}</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ $level->name == 0 ? 'selected' : '' }}>
                                    {{ $level->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="level" />
                    </div>
                    <div class="mb-4 grow">
                        <x-label class="my-2 italic text-left capitalize" value="{{ __('category of course') }}"
                            for="category_id" />
                        <select name="category_id" id="category_id" class="w-full bg-gray-100 rounded"
                            wire:model="category_id">
                            <option value="">
                                {{ __('no category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->name == 0 ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="category_id" />
                    </div>
                </div>

            </div>

        </div>



        <div class="items-center justify-center">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                {{ __('modify') }}
            </button>
        </div>

    </form>
</div>
