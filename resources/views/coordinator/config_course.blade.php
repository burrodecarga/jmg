<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.dataTables.min.css') }}" />
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

    <div class="w-full p-6 mx-auto mt-10">
        <div class="w-full mx-auto text-center card">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4>
                        {{ __('config course') . ' ' . $course->course . ' ' . $course->name }}
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="p-2 border rounded border-1">
                        <div class="grid grid-cols-3 gap-1">
                            <div>

                                @livewire('course-aditional-info', compact('course', 'levels', 'categories'));
                            </div>
                            <div>

                                @livewire('course-requeriments', compact('course'));
                            </div>
                            <div>

                                @livewire('course-goals', compact('course'));
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-admin-layout>
