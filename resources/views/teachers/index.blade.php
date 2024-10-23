<x-teacher-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-1 min-h-svh">
            <div class="p-10 bg-blue-100 rounded-md">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('administration panel') }} :
                    <span class="ml-2 uppercase">
                        {{ $teacher->name }}
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800">
                    Rol:
                    <span
                        class="ml-2 uppercase"></span>{{ __(auth()->user()->roles->first()->name) ?? 'No tiene rol asignado' }}
                </h2>


                <h2 class="text-lg font-semibold leading-tight text-gray-400 uppercase">
                    {{ __('sedes and courses') }}:</h2>
                <div class="grid grid-cols-2 gap-2">

                    @forelse ($courses as $course)
                        <div class="text-xs uppercase px-3 py-1.5 bg-blue-500 rounded-md text-white">
                            <a href="{{ route('course', [$teacher->id, $course->id]) }}">
                                <p> {{ $course->full_sede_id }}</p>
                                <p> {{ $course->full_name }}</p>
                            </a>
                        </div>
                    @empty
                        <span class="text-xs uppercase">
                            {{ __('He is not registered anywhere as a teacher.') }} </span>
                    @endforelse
                </div>

            </div>
            {{-- <div class="info">
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
            </div> --}}
        </div>
    </x-slot>


</x-teacher-layout>
