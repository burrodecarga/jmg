<x-app-layout>
    <div class="py-0 bg-gray-50 sm:py-32">
        <div class="max-w-2xl px-6 mx-auto lg:max-w-7xl lg:px-8">
            <h2 class="font-semibold text-center text-indigo-600 text-base/7">{{ __('lesson config') }}</h2>
            <p
                class="max-w-lg mx-auto mt-2 text-4xl font-medium tracking-tight text-center text-pretty text-gray-950 sm:text-5xl">
                {{ $section->name }}</p>
            <div class="grid gap-4 mt-10 sm:mt-16 lg:grid-cols-3 lg:grid-rows-2">
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                        <div class="px-8 pt-8 pb-3 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 font-medium tracking-tight text-lg/7 text-gray-950 max-lg:text-center">Mobile
                                friendly</p>
                            <p class="max-w-lg mt-2 text-gray-600 text-sm/6 max-lg:text-center">Anim aute id magna
                                aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
                        </div>
                        <div
                            class="relative min-h-[30rem] w-full grow [container-type:inline-size] max-lg:mx-auto max-lg:max-w-sm">
                            <div
                                class="absolute inset-x-10 bottom-0 top-10 overflow-hidden rounded-t-[12cqw] border-x-[3cqw] border-t-[3cqw] border-gray-700 bg-gray-900 shadow-2xl">
                                <img class="object-cover object-top size-full"
                                    src="https://tailwindui.com/plus/img/component-images/bento-03-mobile-friendly.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 lg:rounded-l-[2rem]">
                    </div>
                </div>
                <div class="relative max-lg:row-start-1">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                        <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                            <p class="mt-2 font-medium tracking-tight text-lg/7 text-gray-950 max-lg:text-center">
                                Performance</p>
                            <p class="max-w-lg mt-2 text-gray-600 text-sm/6 max-lg:text-center">Lorem ipsum, dolor sit
                                amet consectetur adipisicing elit maiores impedit.</p>
                        </div>
                        <div
                            class="flex items-center justify-center flex-1 px-8 max-lg:pb-12 max-lg:pt-10 sm:px-10 lg:pb-2">
                            <img class="w-full max-lg:max-w-xs"
                                src="https://tailwindui.com/plus/img/component-images/bento-03-performance.png"
                                alt="">
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]">
                    </div>
                </div>
                <div class="relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2">
                    <div class="absolute bg-white rounded-lg inset-px"></div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)]">
                        <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                            <p class="mt-2 font-medium tracking-tight text-lg/7 text-gray-950 max-lg:text-center">
                                Security</p>
                            <p class="max-w-lg mt-2 text-gray-600 text-sm/6 max-lg:text-center">Morbi viverra dui mi
                                arcu sed. Tellus semper adipiscing suspendisse semper morbi.</p>
                        </div>
                        <div class="flex flex-1 items-center [container-type:inline-size] max-lg:py-6 lg:pb-2">
                            <img class="h-[min(152px,40cqw)] object-cover object-center"
                                src="https://tailwindui.com/plus/img/component-images/bento-03-security.png"
                                alt="">
                        </div>
                    </div>
                    <div class="absolute rounded-lg shadow pointer-events-none inset-px ring-1 ring-black/5"></div>
                </div>
                <div class="relative lg:row-span-2">
                    <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]">
                    </div>
                    <div
                        class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                        <div class="px-8 pt-8 pb-3 sm:px-10 sm:pb-0 sm:pt-10">
                            <p class="mt-2 font-medium tracking-tight text-lg/7 text-gray-950 max-lg:text-center">
                                Powerful APIs</p>
                            <p class="max-w-lg mt-2 text-gray-600 text-sm/6 max-lg:text-center">Sit quis amet rutrum
                                tellus ullamcorper ultricies libero dolor eget sem sodales gravida.</p>
                        </div>
                        <div class="relative min-h-[30rem] w-full grow">
                            <div
                                class="absolute bottom-0 right-0 overflow-hidden bg-gray-900 shadow-2xl left-10 top-10 rounded-tl-xl">
                                <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                    <div class="flex -mb-px text-sm font-medium leading-6 text-gray-400">
                                        <div
                                            class="px-4 py-2 text-white border-b border-r border-b-white/20 border-r-white/10 bg-white/5">
                                            NotificationSetting.jsx</div>
                                        <div class="px-4 py-2 border-r border-gray-600/10">App.jsx</div>
                                    </div>
                                </div>
                                <div class="px-6 pt-6 pb-14">
                                    <!-- Your code example -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]">
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
