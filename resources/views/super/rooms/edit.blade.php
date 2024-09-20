<x-admin-layout>
    <div class="max-w-2xl mx-auto bg-white rounded shadow-lg">
        <div class="w-full p-6 mx-auto my-10">
            <h1 class="text-xl italic font-semibold capitalize">
                {{ __($title) }}
            </h1>
            <hr>
            <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('super.rooms.partials.form_create')
            </form>
        </div>
    </div>
</x-admin-layout>
