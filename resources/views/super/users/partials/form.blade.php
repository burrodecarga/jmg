@csrf

<div class="grid grid-cols-5 gap-4">
    <div class="col-span-2 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('name of user') }}" for="name" />
        <x-input type="text" name="name" class="w-full bg-gray-100" placeholder="{{ __('input name of user') }}"
            value="{{ old('name', $user->name) }}" readonly />
        <x-input-error for="name" />
    </div>
    <div class="col-span-2 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('email') }}" for="email" />
        <x-input type="text" name="email" class="w-full bg-gray-100" placeholder="{{ __('input email of user') }}"
            value="{{ old('email', $user->email) }}" readonly />
        <x-input-error for="email" />
    </div>

    <div class="row-span-2 my-4 mb-1 bg-gray-300">
        <img src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}"
            class="object-cover object-center h-48 rounded w-96">
    </div>

    <div class="col-span-1 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('phone') }}" for="phone" />
        <x-input type="text" name="phone" class="w-full bg-gray-100" placeholder="{{ __('input phone of user') }}"
            value="{{ old('phone', $user->phone) }}" readonly />
        <x-input-error for="phone" />
    </div>

    <div class="col-span-1 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('gender') }}" for="gender" />
        <x-input type="text" name="gender" class="w-full bg-gray-100"
            placeholder="{{ __('input gender of user') }}" value="{{ old('gender', $user->gender) }}" readonly />
        <x-input-error for="gender" />
    </div>


    <div class="col-span-1 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('birthdate') }}" for="birthdate" />
        <x-input type="date" name="birthdate" class="w-full bg-gray-100"
            placeholder="{{ __('input birthdate of user') }}" value="{{ old('birthdate', $user->birthdate) }}"
            readonly />
        <x-input-error for="birthdate" />
    </div>
    <div class="col-span-1 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('role') }}" for="role" />
        <select name="role" id="role" class="w-full bg-gray-100 rounded">
            <option value="">{{ __('no role') }}</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @if ($role->id == $userRoleId) selected @endif>
                    {{ $role->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="col-span-4 mb-1 md:col-span-3">
        <x-label class="my-2 italic capitalize" value="{{ __('address') }}" for="address" />
        <x-input type="text" name="address" class="w-full bg-gray-100"
            placeholder="{{ __('input address of user') }}" value="{{ old('address', $user->address) }}" readonly />
        <x-input-error for="address" />
    </div>
    <div class="col-span-1 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('confirmed') }}" for="confirmed" />
        <select name="confirmed" id="confirmed" class="w-full bg-gray-100 rounded">
            <option value="0" {{ $user->confirmed == 0 ? 'selected' : '' }}>{{ __('no confirmed') }}</option>
            <option value="1" {{ $user->confirmed == 1 ? 'selected' : '' }}>{{ __('confirmed') }}</option>
        </select>
    </div>
    <div class="col-span-1 mb-1">
        <x-label class="my-2 italic capitalize" value="{{ __('active') }}" for="active" />
        <select name="active" id="active" class="w-full bg-gray-100 rounded">
            <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>{{ __('no active') }}</option>
            <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>{{ __('active') }}</option>
        </select>
    </div>
</div>




<button type="submit"
    class="bg-blue-500 text-white hover:bg-blue-400 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __($btn) }}

</button>

<a type="button" href="{{ route('users.index') }}"
    class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    {{ __('cancel') }}

</a>
