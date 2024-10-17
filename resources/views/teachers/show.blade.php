<x-app-layout>
    <section class="bg-gray-700 py-12 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover " src="{{asset('storage/'.$course->image->url)}}"
                    alt="{{$course->title}}">
            </figure>
            <div class="text-white">
                <h1>{{$course->title}}</h1>
                <h2>{{$course->subtitle}}</h2>
                <p><i class="text-sm mr-2 fas fa-chart-line"></i> Nivel : {{$course->level->name}}</p>
                <p><i class="text-sm mr-2 fas fa-chart-pie"></i> Category : {{$course->category->name}}
                    <p><i class="text-sm mr-2 fas fa-users"></i> Matriculate : {{$course->students_count}}</p>
                    <p><i class="text-sm mr-2 fas fa-star"></i> Calificación : {{$course->rating}}</p>
            </div>
        </div>
    </section>


    <div class="container grid grid-cols-1  lg:grid-cols-3 px-4">
        <div class="order-2 lg:order-1 lg:col-span-2">
            <div class="card">
                <div class="card-body bg-white">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">
                        @foreach ($course->goals as $goal)
                        <li class="text-gray-400 text-base"><i class="fas fa-check text-gray-700 mr-2"></i>
                            {{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <section class="card">
                    <div class="card-body">
                        <h2 class="font-bold mb-2 text-3xl py-2 px-4">Temario</h2>
                        @foreach ($course->sections as $section )
                        <article class="mb-4 shadow" @if($loop->first)
                            x-data='{open:true}'
                            @else
                            x-data='{open:false}'
                            @endif>
                            <header class="border border-gray-200 px-4 py-2 cursor-pointer text-gray-200"
                                x-on:click="open = ! open">

                                <h2 class="font-bold text-lg text-gray-600">{{$section->name}} <span>
                                        <i class="far fa-hand-pointer ml-3" title="push Open <-> Close"></i> <i
                                            class="fas fa-sync ml-3"></i> </span></h2>
                            </header>
                            <div class="bg-white py-2 px-4" x-show="open">
                                <ul class="grid grid-cols-1 gap-2 ">
                                    @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i
                                            class="fas fa-play-circle mr-2 text-sm"></i>{{$lesson->name}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                        @endforeach

                    </div>
                </section>
                <section class="px-6">
                    <h2 class="font-bold text-xl">requeriments</h2>
                    <ul class="list-disc list-inside">
                        @foreach ($course->requirements as $requirement )
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                        @endforeach
                    </ul>
                </section>
                <section class="px-4 py-2 bg-white my-10">
                    <h2 class="text-3xl">{{__('Description')}}</h2>
                    <div class="text-gray-600">
                        <p>{{$course->description}}</p>
                    </div>
                </section>
                @livewire('courses-review',['course'=>$course])
            </div>
        </div>
        <div class="cols-span-1 order-1 lg:order-2">
            <section class="card">
                <div class="card-body">
                    <div class="flex mb-8 items-center">
                        <img class="rounded-full shadow-lg h-12 w-12" src="{{$course->teacher->profile_photo_url}}"
                            alt="{{$course->teacher->name}}">
                        <div class="ml-4 flex items-center flex-col">
                            <h2 class="font-bold  text-gray-600 text-lg">
                                Prof: {{$course->teacher->name}}</h2>
                        </div>
                    </div>


                    @canNot('isEnrolled', $course)
                        <form action="{{route('courses.enrolled',$course)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn-success w-full">
                                {{__('Buy Course')}}
                            </button>
                        </form>
                    @else
                        <a class="btn btn-danger mt-4 w-full inline-block text-center" href="{{route('courses.status',$course)}}">Ir a Curso</a>
                    @endcannot

                    <a class="btn btn-danger mt-4 w-full inline-block text-center" href="{{route('payment.checkout',$course)}}">Checkout</a>

                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similar as $s )
                <article class="flex mb-4">
                    <img class="h-32 w-40 object-cover" src="{{asset('storage/'.$s->image->url)}}"
                        alt="{{$s->teacher->name}}">
                    <div class="ml-3">
                        <a href="{{route('courses.show',$s)}}">
                            {{Str::limit($s->title,40)}}</a>

                        <div class="flex items-center">
                            <img class="h-8 w-8 object-cover rounded-full" src="{{$s->teacher->profile_photo_url}}"
                                alt="{{$s->teacher->name}}">
                            <p class="ml-3 text-xs">{{$s->teacher->name}}</p>
                            </p>
                        </div>
                    </div>
                </article>
                @endforeach

            </aside>
        </div>
    </div>


</x-app-layout>
