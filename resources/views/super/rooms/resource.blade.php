<x-admin-layout>
    <div class="w-1/2 mx-auto bg-white rounded shadow-lg">
        <div class="w-full p-6 mx-auto my-10">
            <h1 class="text-xl italic font-semibold capitalize">
                {{ __($title) }}
            </h1>
            <hr>
            <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="room_id" value="{{ $room->id }}" />
                @include('super.rooms.partials.form_resource')
            </form>
        </div>
    </div>
</x-admin-layout>
