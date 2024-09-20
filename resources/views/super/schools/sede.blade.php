<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        <h2 class="w-full text-xl font-semibold capitalize sm:w-full md:w-3/4">{{ __('school adminitration panel') }}
        </h2>
    </x-slot>

    <div class="container mt-10">
        <div class="mx-auto text-center w-5/4 card">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4>
                        {{ __('list of sedes') . ' ' . $school->name }}
                    </h4>


                </div>
            </div>
            <div class="card-body">
                <table id="sede" class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th>{{ __('name of sede') }}</th>
                            <th>{{ __('department') }}</th>
                            <th>{{ __('municipality') }}</th>
                            <th class="text-center"> {{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sedes as $sede)
                            <tr class="odd:bg-slate-100">
                                <td width="50%" class="text-left">{{ $sede->name }}</td>
                                <td width="20%" class="text-left">{{ $sede->department }}</td>
                                <td width="20%" class="text-left">{{ $sede->municipality }}</td>
                                <td class="text-center" width="10%">
                                    <a href="#" title="{{ __('view detail of sede') . ' ' . $sede->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-eye"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#sede').DataTable({
                    "pagingType": "full_numbers",
                    "language": {
                        "info": "Mostrando pag  _PAGE_ de _PAGES_  páginas,  Total de Registros: _TOTAL_ ",
                        "search": "Buscar  ",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior",
                            "last": "Último",
                            "first": "Primero",
                        },
                        "lengthMenu": "Mostrar  <select class='custom-select custom-select-sm'>" +
                            "<option value='5'>5</option>" +
                            "<option value='10'>10</option>" +
                            "<option value='15'>15</option>" +
                            "<option value='20'>20</option>" +
                            "<option value='25'>25</option>" +
                            "<option value='50'>50</option>" +
                            "<option value='100'>100</option>" +
                            "<option value='-1'>Todos</option>" +
                            "</select> Registros",
                        "loadingRecord": "Cargando....",
                        "processing": "Procesando...",
                        "emptyTable": "No hay Registros",
                        "zeroRecords": "No hay coincidencias",
                        "infoEmpty": "",
                        "infoFiltered": ""
                    },
                    "columnDefs": [{
                        "targets": [3],
                        "orderable": false
                    }]
                });
            });
        </script>
    @endpush
</x-admin-layout>
