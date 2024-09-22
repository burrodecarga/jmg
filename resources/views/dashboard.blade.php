<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
            <div class="info">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('administration panel') }} :
                    <span class="ml-2 uppercase">
                        {{ auth()->user()->name }}
                        {{-- {{ auth()->user()->getPermissionsViaRoles()->pluck('name') }} --}}
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800">
                    Rol:
                    <span
                        class="ml-2 uppercase"></span>{{ auth()->user()->roles->first()->name ?? 'No tiene rol asignado' }}
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800">
                    Coordinador:
                    <span class="text-xs uppercase">
                        {{ auth()->user()->coordina->first()->name ?? 'No es Coordinador de Sede' }}
                    </span>
                </h2>
            </div>
            <div class="periodo">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('school period') }} :
                    <span class="ml-2 uppercase">
                        BDC
                    </span>
                </h2>
            </div>

        </div>
        {{-- <h2 class="text-sm font-semibold leading-tight text-gray-800">
            Rol: {{ auth()->user()->roles->first()->permissions()->pluck('privilege') ?? 'No tiene rol asignado' }}
        </h2> --}}

    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
