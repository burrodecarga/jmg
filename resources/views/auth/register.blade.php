<x-guest-layout>
    @session('status')
        <div class="mb-2 text-sm font-medium text-green-600">
            {{ $value }}
        </div>
    @endsession
    <div class="px-20 mx-auto">
        <x-validation-errors class="mb-4" />
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex items-center justify-center bg-gray-100 max-h">
            <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
                <!-- left side -->
                <div class="flex flex-col justify-center p-8 md:p-14">
                    <span class="mb-3 text-4xl font-bold">Welcome back</span>
                    <span class="mb-1 font-light text-gray-400">
                        Welcom back! Please enter your details
                    </span>
                    <div class="py-4">
                        <span class="mb-2 text-md">Name</span>
                        <x-input id="name" type="text" name="name" :value="old('name', 'coordinator1@gmail.com')" required autofocus
                            autocomplete="username"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="name" id="name" />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">Email</span>
                        <x-input id="email" type="email" name="email" :value="old('email', 'coordinator1@gmail.com')" required autofocus
                            autocomplete="username"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="email" id="email" />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">Password</span>
                        <x-input id="password" type="password" name="password" required autocomplete="current-password"
                            value="123"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" />
                    </div>

                    <div class="py-4">
                        <span class="mb-2 text-md">Confirm Password</span>
                        <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <div class="flex justify-between w-full py-4">
                        <div class="mr-24">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                        <span class="font-bold text-md">

                            <a class="text-sm text-gray-600 no-underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('I already have an account') }}
                            </a>

                        </span>
                    </div>
                    <button type="submit"
                        class="w-full p-2 mb-6 text-white bg-black rounded-lg hover:bg-white hover:text-black hover:border hover:border-gray-300">
                        Register
                    </button>

                </div>
                <!-- {/* right side */} -->
                <div class="relative">
                    <img src="{{ asset('img/image.jpg') }}" alt="img"
                        class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover" />
                    <!-- text on image  -->
                    <div
                        class="absolute hidden p-6 bg-white rounded bottom-10 right-6 bg-opacity-30 backdrop-blur-sm drop-shadow-lg md:block">
                        <span class="text-xl text-white">We've been uesing Untitle to kick"<br />start every new project
                            and can't <br />imagine working without it."
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
