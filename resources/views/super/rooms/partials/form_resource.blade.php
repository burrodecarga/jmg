@csrf
<div class="grid grid-cols-1 gap-2 md:grid-cols-3">
    <div class="mb-4">
        <x-label class="my-2 italic capitalize" value="{{ __('category') }}" for="category" />
        <select name="category" class="w-full rounded">
            @foreach ($categories as $c)
                <option value="{{ $c }}">{{ $c }}</option>
            @endforeach
        </select>
        <x-input-error for="category" />
    </div>
    <div class="mb-4">
        <x-label class="my-2 italic capitalize" value="{{ __('name of resource') }}" for="name" />
        <x-input type="text" name="name" class="w-full" placeholder="{{ __('input name of resource') }}"
            value="{{ old('name', $resource->name) }}" />
        <x-input-error for="name" />
    </div>
    <div class="mb-4">
        <x-label class="my-2 italic capitalize" value="{{ __('quantity of resource') }}" for="quantity" />
        <x-input type="number" min="1" step="any" name="quantity" class="w-full"
            placeholder="{{ __('input quantity of resource') }}" value="{{ old('quantity', $resource->quantity) }}" />
        <x-input-error for="quantity" />
    </div>
    <div class="col-span-1 mb-4 md:col-span-3">
        <x-label class="my-2 italic capitalize" value="{{ __('description of resource') }}" for="description" />
        <textarea type="textarea" cols="2" rows="2" name="description" class="w-full rounded"
            placeholder="{{ __('input description of resource') }}" value="{{ old('description', $resource->description) }}"></textarea>
        <x-input-error for="description" />
    </div>
</div>


<button type="submit"
    class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('sedes.index') }}"
    class="bg-yellow-700 text-white hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
