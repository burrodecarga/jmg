<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

    <div class="w-2/3 p-10 mx-auto my-10 bg-white rounded shadow-lg">
        <div class="p-6 mx-auto my-0 bg-slate-100">
            <h2 class="text-sm italic font-semibold capitalize">
                {{ __($title) . ' : ' }}
            </h2>
            <h2 class="text-sm font-semibold uppercase">
                {{ $sede->name }}
            </h2>
            <hr>
            <div class="grid gap-4 gris-cols-2">
                <div>
                    <p>GRADOS</p>
                </div>
                <div>
                    <div class="w-full">
                        <div class="w-full mx-auto text-center card md:w-100">
                            <div class="text-white card-header bg-primary">
                                <div class="flex items-center justify-between card-title">
                                    <h4>
                                        {{ __('list of grados') }}
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('schools.sedes.grados_store') }}" method="POST">
                                    @include('super.sedes.partials.form_grados_create')
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
