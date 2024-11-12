<x-app-layout>
    <div class="max-w-md mx-auto bg-white rounded shadow-lg">
        <div class="w-full p-6 mx-auto my-10">
            <h1 class="text-[clamp(14px,1.5vw,24px)] font-bold text-center uppercase bg-white rounded-xl">
                <strong>{{ $title }}</strong>
            </h1>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @method('PUT')
                @include('superadmin.roles.partials.form')
                @include('superadmin.roles.partials.permissions')
            </form>
        </div>
    </div>
</x-app-layout>
