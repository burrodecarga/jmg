<x-app-layout>
    <div class="max-w-md mx-auto bg-white rounded shadow-lg">
        <div class="w-full p-6 mx-auto my-10 bg-white rounded-xl">
            <h1 class="text-[clamp(14px,1.5vw,24px)] font-bold uppercase text-center">
                <strong>{{ $title }}</strong>
            </h1>

            <form action="{{ route('roles.create') }}" method="POST" class="p-6 bg-slate-100">
                <div class="mb-4">
                    <x-label class="my-2 italic capitalize" value="{{ __('name of role') }}" for="name" />
                    <x-input type="text" name="name" class="w-full" placeholder="{{ __('input name of role') }}"
                        value="{{ old('name', $role->name) }}" readonly="true" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    @include('superadmin.roles.partials.permissions')
                </div>

                <a type="button" href="{{ route('roles.index') }}"
                    class="bg-green-700 text-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-30 no-underline">
                    {{ __('back') }}

                </a>
            </form>
        </div>
    </div>
</x-app-layout>
