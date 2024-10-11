<x-app-layout>
    <div class="mx-auto mt-3 bg-white rounded-md max-w-7xl">
        <div class="flex flex-col justify-between p-10 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $lesson->name }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-wrap">{{ $lesson->description }}</p>
            <a href="{{ route('config_course', $lesson->section->course->id . '#sections') }}"
                class="inline-flex items-center w-48 px-3 py-2 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg bottom-3 right-36 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('back') }}
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>

    <div class="grid justify-between grid-cols-1 gap-3 px-10 py-2 mx-auto md:grid-cols-4 max-h-svh max-w-7xl">
        @livewire('add-pdf-to-lesson', compact('lesson'))
        @livewire('add-image-to-lesson', compact('lesson'))
        <div class="col-span-1 md:col-span-2">
            @livewire('add-video-to-lesson', compact('lesson'))
        </div>






    </div>
</x-app-layout>
