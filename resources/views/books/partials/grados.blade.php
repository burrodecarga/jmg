<div class="p-2 my-3 bg-gray-200">
    <h3 class="font-bold capitalize">{{ __('assignable grados') }}</h3>
    <hr>
</div>
<input type="hidden" name="id" value="{{ $role->id }}">
<div>
    <div class="grid grid-cols-2">
        @foreach ($grados as $key => $p)
            <label for="grados">
                <input type="checkbox" name="grados[]" id="grados" value="{{ $p->name }}"
                    {{ in_array($p->id, $grados_id) ? 'checked' : '' }}>
                <span style="ml-2">

                    {{ $p->name }}
                    </p>
            </label>
        @endforeach
    </div>
</div>
