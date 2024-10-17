<x-guest-layout>
    @session('status')
        <div class="mb-2 text-sm font-medium text-green-600">
            {{ $value }}
        </div>
    @endsession

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex items-center justify-center max-h-screen bg-gray-100">
            <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
                <!-- left side -->
                <div class="flex flex-col justify-center p-8 md:p-14">
                    <span class="mb-3 text-4xl font-bold">{{ __('Welcome back') }}</span>
                    <span class="mb-1 font-light text-gray-400">
                        {{ __('Welcom back! Please enter your details') }}
                    </span>
                    <div class="py-4">
                        <span class="mb-2 text-md">{{ __('Email') }}</span>
                        <x-input id="email" type="email" name="email" :value="old('email', 'teacher1@gmail.com')" required autofocus
                            autocomplete="username"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="email" id="email" />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">{{ __('Password') }}</span>
                        <x-input id="password" type="password" name="password" required autocomplete="current-password"
                            value="123"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" />
                    </div>
                    <div class="flex justify-between w-full py-4">
                        <div class="mr-24">
                            <input type="checkbox" name="remember" class="mr-2" />
                            <span class="text-md">{{ __('Remember for 30 days') }}</span>
                        </div>
                        <span class="font-bold text-md">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 no-underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </span>
                    </div>
                    <button type="submit"
                        class="w-full p-2 mb-6 text-white bg-black rounded-lg hover:bg-white hover:text-black hover:border hover:border-gray-300">
                        {{ __('Sign in') }}
                    </button>
                    <button
                        class="w-full p-2 mb-6 border border-gray-300 rounded-lg text-md hover:bg-black hover:text-white">
                        <img src="{{ asset('img/google.svg') }}" alt="img" class="inline w-6 h-6 mr-2" />
                        {{ __('Sign in with Google') }}
                    </button>
                    <div class="text-center text-gray-400">
                        {{ __("Dont'have an account?") }}
                        <a href="{{ route('register') }}">
                            <span class="font-bold text-black">{{ __('Sign up for free') }}</span></a>
                    </div>
                </div>
                <!-- {/* right side */} -->
                <div class="relative">
                    <img src="{{ asset('img/image5.jpg') }}" alt="img"
                        class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover" />
                    <!-- text on image  -->
                    <div
                        class="absolute hidden p-6 rounded bg-slate-700 bottom-10 right-6 bg-opacity-30 backdrop-blur-sm drop-shadow-lg md:block">
                        <span class="text-xl text-white">We've been uesing Untitle to kick"<br />start every new
                            project
                            and can't <br />imagine working without it."
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
