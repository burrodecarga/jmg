<x-admin-layout>
    <div class="w-2/3 mx-auto mt-0">
        <div class="p-8">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h1 class="mt-6 text-4xl font-medium text-center text-gray-700 capitalize"> {{ $school->name }} </h1>

                    <p class="mt-1 text-lg font-light text-center text-gray-800">NIT: {{ $school->nit }} </p>
                    <p class="mt-1 text-lg font-light text-center text-gray-800">D.A.N.E. {{ $school->dane }} </p>
                </div>
                <div>
                    <img id="img" class="object-cover my-2 rounded-md" src="{{ asset($school->image) }}">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="p-8">
                    <div
                        class="flex items-center justify-center w-16 h-16 text-indigo-500 bg-indigo-100 rounded-full shadow-2xl">
                        <a href="{{ route('schools.sedes.sede', $school->id) }}"
                            title="{{ __('see school locations') . ' ' . $school->name }}">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <h2 class="mt-6 mb-3 font-medium text-indigo-500 uppercase"> {{ __('sedes') }} </h2>
                    <p class="mb-3 text-sm font-light text-gray-500">
                        @foreach ($school->sedes as $sede)
                            <form action="{{ route('schools.sedes.show', [$school->id, $sede->id]) }}">
                                <button type="submit"
                                    class="flex items-center w-64 p-4 bg-white border border-gray-200 rounded hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100">
                                    <div class="flex items-center justify-center mr-4 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <h1 class="text-sm font-bold text-gray-700">{{ $sede->name }}</h1>
                                </button>
                            </form>
                        @endforeach
                    </p> <a class="flex items-center text-sm text-indigo-500 hover:text-indigo-600"
                        href="{{ route('schools.sedes.sede', $school->id) }}">
                        {{ __('see list of schools') }} <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg> </a>
                </div>
                <div class="p-8">
                    <div
                        class="flex items-center justify-center w-16 h-16 text-green-500 bg-green-100 rounded-full shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="mt-6 mb-3 font-medium text-green-500 uppercase"> Social conversations </h2>
                    <p class="mb-3 text-sm font-light text-gray-500"> We get insulted by others, lose trust for those
                        others. We
                        get
                        back stabbed by friends. It becomes harder for us to give others a hand. </p> <a
                        class="flex items-center text-green-500 hover:text-green-600" href="/"> More about us icon
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg> </a>
                </div>
                <div class="p-8">
                    <div
                        class="flex items-center justify-center w-16 h-16 text-red-500 bg-red-100 rounded-full shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="mt-6 mb-3 font-medium text-red-500 uppercase"> Social conversations </h2>
                    <p class="mb-3 text-sm font-light text-gray-500"> We get insulted by others, lose trust for those
                        others. We
                        get
                        back stabbed by friends. It becomes harder for us to give others a hand. </p> <a
                        class="flex items-center text-red-500 hover:text-red-600" href="/"> More about us icon
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg> </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
