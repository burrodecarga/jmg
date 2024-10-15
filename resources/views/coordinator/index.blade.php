<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
            <div class="info">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('administration panel') }} :
                    <span class="ml-2 uppercase">
                        {{ auth()->user()->name }}
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
            <div class="info">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('school info') }} :
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->name ?? 'No es Coordinador de Sede' }}
                        </span>
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->address ?? 'No es Coordinador de Sede' }}
                        </span>
                    </span>
                </h2>
            </div>
            <div class="contact">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('school contact') }} :
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->email ?? 'no registrado' }}
                        </span>
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->phone ?? 'no registrado' }}
                        </span>-
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->cell ?? 'no registrado' }}
                        </span>
                    </span>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl min-h-screen mx-auto bg-slate-100 sm:px-6 lg:px-8">
        <div class="py-6">
            <div class="col-span-1 overflow-hidden bg-white shadow-xl max-h-svh sm:rounded-lg">
                <div class="grid w-full grid-cols-2 gap-2 bg-white">
                    <div class="col-span-2">
                        <h5
                            class="block p-4 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-center text-gray-900 uppercase bg-slate-400 ">
                            {{ __('main menu') }} </h5>
                    </div>
                    @include('coordinator.partials.route_add_sectios')
                    @include('coordinator.partials.route_add_teachers')
                    @include('coordinator.partials.route_create_lectivos')
                    @include('coordinator.partials.route_add_teachers_to_lectivo')
                    @include('coordinator.partials.route_grado_courses')
                    @include('coordinator.partials.route_books')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
