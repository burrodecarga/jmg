<!DOCTYPE html>
<html style="{scroll-behavior: smooth;}" class="h-full scroll-smooth"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rokave') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

    <style type="css/tailwindcss">
        html: {
            scroll-behavior: smooth !important
        }
    </style>

    @livewireStyles

    @stack('styles')


    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <x-flash-messages />
            {{ $slot }}

        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

    @stack('script')
    <script>
        //Session Flash auto close
        setTimeout(function() {
            $('#alert').remove()
        }, 2000)
    </script>

    <script>
        window.addEventListener('swal', function(e) {
            Swal.fire(e.detail);
        });
    </script>

</body>

</html>