@csrf
<div class="">
    <div class="col-span-1">
        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('name of grado') }}" for="name" />
            <x-input type="text" name="name" class="w-full" placeholder="{{ __('input name of grado') }}"
                value="{{ old('name', $grado->name) }}" />
            <x-input-error for="name" />
        </div>

        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('ordinal of grado') }}" for="ordinal" />
            <x-input type="text" name="ordinal" class="w-full" placeholder="{{ __('input ordinal of grado') }}"
                value="{{ old('ordinal', $grado->ordinal) }}" />
            <x-input-error for="ordinal" />
        </div>

        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('level of grado') }}" for="level" />
            <x-input type="text" name="level" class="w-full" placeholder="{{ __('input level of grado') }}"
                value="{{ old('level', $grado->level) }}" />
            <x-input-error for="level" />
        </div>
    </div>
</div>


<button type="submit"
    class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('grados.index') }}"
    class="bg-yellow-700 text-white hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
