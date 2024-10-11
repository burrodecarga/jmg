<div
    class="relative p-5 max-w-sm min-h-['315px'] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    @if ($lesson->images->count())
        @include('components.carrousel.carrousel')
    @else
        <a href="#">
            <img class="object-cover h-48 rounded-t-lg w-96" src="{{ asset('storage/img/images.svg') }}" alt="" />
        </a>
    @endif
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('images') }}:
            </h5>
        </a>
        <ol class="px-2 mb-4 list-decimal">
            @forelse ($lesson->images as $img)
                <li><span class="text-sm font-semibold ">
                        {{ $img->name }}
                    </span></li>
            @empty
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ __('does not have supporting material information in image form') }}.</p>
            @endforelse
        </ol>
        <a wire:click="$set('openImageModal',true)" href="#"
            class="absolute inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg bottom-4 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('add image') }}
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    @include('components.modales.addImageModal')
</div>
