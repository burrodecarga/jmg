@csrf
<div class="grid grid-cols-1 gap-5 md:grid-cols-2">
    <div class="col-span-1">
        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('name of school') }}" for="name" />
            <x-input type="text" name="name" class="w-full" placeholder="{{ __('input name of school') }}"
                value="{{ old('name', $school->name) }}" />
            <x-input-error for="name" />
        </div>

        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('nit of school') }}" for="nit" />
            <x-input type="text" name="nit" class="w-full" placeholder="{{ __('input nit of school') }}"
                value="{{ old('nit', $school->nit) }}" />
            <x-input-error for="nit" />
        </div>

        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('dane of school') }}" for="dane" />
            <x-input type="text" name="dane" class="w-full" placeholder="{{ __('input dane of school') }}"
                value="{{ old('dane', $school->dane) }}" />
            <x-input-error for="dane" />
        </div>
    </div>
    <div class="col-span-1">
        <div class="mb-4">
            <x-label class="my-2 italic capitalize" value="{{ __('logo of school') }}" for="url" />
            <input type="file" name="url" id="fichero" class="text-xs text-center">
            <div class="p-4">

                <img id="img" class="object-cover my-2 rounded-md" src="{{ asset($school->image) }}">
            </div>
            <x-input-error for="url" />
            <p id="texto" class="text-xs text-center text-red-500"></p>
        </div>
    </div>
</div>


<button type="submit"
    class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('schools.index') }}"
    class="bg-yellow-700 text-white hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
