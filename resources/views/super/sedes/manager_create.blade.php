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
                    @livewire('add-manager-to-sede', compact('sede'))
                </div>
                <div>
                    <div class="w-full">
                        <div class="w-full mx-auto text-center card md:w-100">
                            <div class="text-white card-header bg-primary">
                                <div class="flex items-center justify-between card-title">
                                    <h4>
                                        {{ __('list of users') }}
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="user" class="table text-sm table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">Id</th>
                                            <th width="25%">Name</th>
                                            <th width="25%">Last Name</th>
                                            <th width="15%">Cedula</th>
                                            <th width="15%">Rol</th>
                                            {{-- <th width="15%">actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm text-left">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    @push('script')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


        <script>
            $(document).ready(function() {
                $('#user').DataTable({
                    "columnDefs": [{
                        "targets": [4],
                        "orderable": false,
                        "searchable": false


                    }],
                    "serverSide": true,
                    "ajax": "{{ url('api/manager') }}",
                    "columns": [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'last_name'
                        },
                        {
                            data: 'cedula'
                        },
                        {
                            data: 'roles.[0].name'

                        },
                        //{
                        //    data: 'btn'
                        //},

                    ]

                });
                setTimeout(function() {
                    $('#alert').remove()
                }, 3000)

            });
        </script>
    @endpush
</x-admin-layout>
