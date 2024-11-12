<x-app-layout>
    <div class="mx-auto max-w-7xl">

        <section class="px-4 py-12 bg-gray-700">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <figure>
                    @if ($course->image)
                        <img class="object-cover w-full h-60 " src="{{ asset('storage/' . $course->image->url) }}"
                            alt="{{ $course->title }}">
                    @else
                        <img class="object-cover w-full h-60 " src="{{ asset('img/curso1.jpg') }}"
                            alt="{{ $course->title }}">
                    @endif
                </figure>
                <div class="text-white">
                    <h1 class="text-2xl uppercase">{{ $course->name }}</h1>
                    <h2 class="text-xl italic">{{ $course->subtitle }}</h2>
                    <h2 class="italic text-md">Año: {{ $lectivo->year }}
                    </h2>
                    <h2 class="italic text-md">Período desde
                        {{ $lectivo->start->format('d/m/Y') }}
                        hasta
                        {{ $lectivo->end->format('d/m/Y') }}
                    </h2>
                    <p><i class="mr-2 text-sm fas fa-chart-line"></i> Nivel : {{ $course->level }}</p>
                    <p><i class="mr-2 text-sm fas fa-chart-pie"></i> Grado : {{ $course->grado }}
                    <p><i class="mr-2 text-sm fas fa-list-ol"></i> Ordinal : {{ $course->ordinal }}

                    <p><i class="mr-2 text-sm fas fa-users"></i> Matriculados : {{ $course->students_count }}</p>
                    <p><i class="mr-2 text-sm fas fa-star"></i> Calificación : {{ $course->rating }}</p>
                </div>
            </div>
        </section>
        <div class="grid grid-cols-1 lg:grid-cols-3">
            <div class="order-2 py-5 lg:order-1 lg:col-span-2">
                <div class="card">
                    <div class="px-10 bg-white card-body ">
                        <section class="px-4 py-2 my-10 bg-white">
                            <h2 class="text-3xl">{{ __('Description') }}</h2>
                            <div class="text-gray-600">
                                <p>{{ $course->description }}</p>
                            </div>
                        </section>
                    </div>
                </div>
                <section class="px-4 py-2 my-10 bg-white">
                    <div class="card">
                        <div class="px-10 bg-white card-body ">
                            <h2 class="text-xl font-bold capitalize">requerimientos</h2>
                            <ul class="list-disc list-inside">
                                @foreach ($course->requeriments as $requeriment)
                                    <li class="text-base text-gray-700">{{ $requeriment->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
                <div class="card">
                    <div class="px-10 bg-white card-body ">
                        <h1 class="mb-2 text-2xl font-bold">Objetivos: Lo que se debe enseñar</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">
                            @foreach ($course->goals as $goal)
                                <li class="text-base text-gray-400"><i class="mr-2 text-gray-700 fas fa-check"></i>
                                    {{ $goal->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <section class="card">
                        <div class="card-body">
                            <h2 class="px-4 py-2 mb-2 text-3xl font-bold">Temario</h2>
                            @foreach ($course->sections as $section)
                                <article class="mb-4 shadow"
                                    @if ($loop->first) x-data='{open:true}'
                                @else
                                x-data='{open:false}' @endif>
                                    <header class="px-4 py-2 text-gray-200 border border-gray-200 cursor-pointer"
                                        x-on:click="open = ! open">

                                        <h2 class="text-lg font-bold text-gray-600">{{ $section->name }} <span>
                                                <i class="ml-3 far fa-hand-pointer" title="push Open <-> Close"></i> <i
                                                    class="ml-3 fas fa-sync"></i> </span></h2>
                                    </header>
                                    <div class="px-4 py-2 bg-white" x-show="open">
                                        <ul class="grid grid-cols-1 gap-2 ">
                                            @foreach ($section->lessons as $lesson)
                                                <li class="text-base text-gray-700"><i
                                                        class="mr-2 text-sm fas fa-play-circle"></i>{{ $lesson->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </section>



                    {{-- @livewire('course-review', ['course' => $course]) --}}
                </div>
            </div>
            <div class="order-1 py-5 mx-10 cols-span-1 lg:order-2">
                <section class="card">
                    <div class="card-body">
                        <div class="flex items-center mb-8">
                            <img class="w-12 h-12 rounded-full shadow-lg" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ $lectivo->teacher_name }}">
                            <div class="flex flex-col items-center ml-4">
                                <h2 class="text-lg font-bold text-gray-600">
                                    Prof: {{ $lectivo->teacher_name }}</h2>
                            </div>
                        </div>


                        {{-- @canNot('isEnrolled', $course)
                            <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full btn-success">
                                    {{ __('Buy Course') }}
                                </button>
                            </form>
                        @else
                            <a class="inline-block w-full mt-4 text-center btn btn-danger"
                                href="{{ route('courses.status', $course) }}">Ir a Curso</a>
                        @endcannot --}}

                        {{-- <a class="inline-block w-full mt-4 text-center btn btn-danger"
                            href="{{ route('payment.checkout', $course) }}">Checkout</a> --}}

                    </div>
                </section>

                <aside class="hidden lg:block">
                    {{-- @foreach ($similar as $s)
                        <article class="flex mb-4">
                            <img class="object-cover w-40 h-32" src="{{ asset('storage/' . $s->image->url) }}"
                                alt="{{ $s->teacher->name }}">
                            <div class="ml-3">
                                <a href="{{ route('courses.show', $s) }}">
                                    {{ Str::limit($s->title, 40) }}</a>

                                <div class="flex items-center">
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="{{ $s->teacher->profile_photo_url }}" alt="{{ $s->teacher->name }}">
                                    <p class="ml-3 text-xs">{{ $s->teacher->name }}</p>
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach --}}

                </aside>
            </div>
        </div>
    </div>

</x-app-layout>
