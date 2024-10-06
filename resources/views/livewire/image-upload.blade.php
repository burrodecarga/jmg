<div class="grid grid-cols-6 outline-offset-2">
    <h1>{{ __('image upload') }}</h1>
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="" width="500" height="500">
    @endif
    <div class="">
        <div class="col-span-1">
            <div class="mb-4">
                <x-label class="my-2 italic text-left capitalize" value="{{ __('section of course') }}" for="section" />
                <x-input id="section" type="text" class="w-full" placeholder="{{ __('input section of course') }}"
                    wire:model="section" />
                <x-input-error for="section" class="text-left" />
            </div>
        </div>
    </div>
</div>
