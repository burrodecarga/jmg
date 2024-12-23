<x-admin-layout>
    <div class="w-2/3 p-10 mx-auto my-10 bg-white rounded shadow-lg">
        <div class="p-6 mx-auto my-0 bg-slate-100">
            <h1 class="text-sm italic font-semibold capitalize">
                {{ __('school') . ' : ' . $sede->school }}
            </h1>
            <h1 class="text-sm italic font-semibold capitalize">
                {{ __($title) . ' : ' . ' sede: ' . $sede->name }}
            </h1>
            <hr>
            <form action="{{ route('schools.sedes.room_store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="sede_id" value="{{ $sede->id }}">
                <input type="hidden" name="school_id" value="{{ $sede->school_id }}">
                @include('super.sedes.partials.form_create')
            </form>
        </div>
    </div>
</x-admin-layout>
