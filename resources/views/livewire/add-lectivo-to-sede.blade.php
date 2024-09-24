<form wire:submit='createLectivo'>
    <div class="p-6 bg-white lg:p-8">
        <div class="w-full">
            <div class="col-span-1 mb-1">
                <x-label class="my-2 italic capitalize" value="{{ __('periodo') }}" for="periodo" />
                <select name="periodo" id="periodo" class="w-full bg-gray-100 rounded" wire:model="periodo_id">
                    <option value="">{{ __('no periodo') }}</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}">
                            {{ $periodo->lapso }}
                        </option>
                    @endforeach
                </select>
                <x-input-error for="periodo_id" />
            </div>

            <x-button type="submit"
                class="items-center justify-center w-full px-6 py-4 mx-auto my-6 text-white bg-green-700 rounded">Crear
                Período
                lectivo</x-button>
        </div>
        <span wire:loading>processing...</span>
        <p>{{ $periodo_id }}</p>
    </div>
</form>
