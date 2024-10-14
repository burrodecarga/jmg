<x-app-layout>


    <section
        class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="max-w-screen-xl px-4 py-24 mx-auto text-center lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">
                {{ $book->title }}</h1>
            <p class="mb-1 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">ISBN:{{ $book->isbn }}
            </p>
            <p class="mb-1 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                {{ __('author') }}:{{ $book->author }}
            </p>
            <p class="mb-1 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                {{ __('course') }} : {{ $book->course }}- {{ __('pages') }} : {{ $book->pages }}
            </p>
            <p class="mb-1 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                {{ __('grado') }} : {{ $book->grado }}
            </p>
            <p class="mb-1 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                {{ __('quantity') }} : {{ $book->quantity }}
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white border border-white rounded-lg hover:text-gray-900 sm:ms-4 hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
