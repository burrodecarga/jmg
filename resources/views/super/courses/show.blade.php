<x-admin-layout>
    <div class="max-w-md mx-auto bg-white rounded shadow-lg">
        <div class="w-full mx-auto p-6 my-10">
            <h1 class="font-bold text-2xl capitalize"><strong>{{ $title }}</strong></h1>
            <hr>
            <form action="{{ route('roles.create') }}" method="POST">
                <div class="mb-4">
                    <x-label class="italic my-2 capitalize" value="{{ __('name of role') }}" for="name" />
                    <x-input type="text" name="name" class="w-full" placeholder="{{ __('input name of role') }}"
                        value="{{ old('name', $role->name) }}" readonly="true" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    @include('super.roles.partials.permissions')
                </div>

                <a type="button" href="{{ route('roles.index') }}"
                    class="bg-green-700 text-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-30">
                    {{ __('back') }}

                </a>
            </form>
        </div>
    </div>
</x-admin-layout>
