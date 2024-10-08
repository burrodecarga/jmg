@csrf

<div class="mb-4">
    <x-label class="italic my-2 capitalize" value="{{ __('name of role') }}" for="name"/>
    <x-input type="text" name="name" class="w-full" placeholder="{{ __('input name of role')}}"
    value="{{ old('name',$role->name) }}"/>
    <x-input-error for="name" />
</div>

<button type="submit"
class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('roles.index') }}"
class="bg-yellow-700 text-white hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
