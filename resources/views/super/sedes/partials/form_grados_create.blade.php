@csrf
<div class="p-2 my-3 bg-gray-200">
    <h3 class="font-bold capitalize">{{ __('assignable grados') }}</h3>
    <hr>
</div>
<input type="hidden" name="id" value="{{ $sede->id }}">
<div>
    <div class="grid grid-cols-3 gap-2 text-left">
        @foreach ($grados as $key => $p)
            <label for="grados" class="flex items-center justify-start gap-3 px-4 bg-slate-200 rounde">
                <input type="checkbox" name="grados[]" id="grados" value="{{ $p->id }}"
                    {{ in_array($p->id, $grados_id) ? 'checked' : '' }} />
                <span>
                    <p class="mb-0 text-sm font-semibold text-gray-700">
                        {{ $p->name }}
                    </p>
                    <p class="mb-0 text-sm text-gray-600">
                        {{ $p->level }}
                    </p>
                </span>

            </label>
        @endforeach
    </div>
</div>
<div class="flex gap-4 my-3">
    <button type="submit"
        class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        {{ __('assign grados') }}

    </button>

    <a type="button" href="{{ route('sedes.index') }}"
        class="bg-yellow-700 text-white hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        {{ __('cancel') }}

    </a>
</div>
