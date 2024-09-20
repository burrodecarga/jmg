<x-app-layout>
    <div class="px-8 py-2 rounded-xl">
        <div class="p-6 mt-2 bg-white border-b border-gray-200 lg:p-8">
            <h1 class="mt-1 text-2xl font-medium text-gray-900">
                Welcome
            </h1>
            @include('parent.partials.panel')
            @include('parent.partials.info')


        </div>

        <div class="grid grid-cols-1 gap-6 p-6 bg-gray-200 bg-opacity-25 md:grid-cols-3 lg:gap-8 lg:p-8">
            <div class="bg-white rounded">
                <div class="p-3">

                    @include('parent.partials.representados_table')
                </div>
            </div>
        </div>
</x-app-layout>
