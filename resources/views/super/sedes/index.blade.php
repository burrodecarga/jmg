<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        <h2 class="w-full text-xl font-semibold capitalize sm:w-full md:w-3/4">{{ __('sedes adminitration panel') }}
        </h2>
    </x-slot>

    <div class="p-10 mt-0">
        <div class="w-full mx-auto text-center card">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4>
                        {{ __('list of school locations') }}
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <table id="sede" class="table text-sm table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('school') }}</th>
                            <th>{{ __('sede') }}</th>
                            <th>{{ __('department') }}</th>
                            <th>{{ __('municipality') }}</th>
                            <th class="text-center"> {{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach ($sedes as $sede)
                            <tr class="odd:bg-slate-100">
                                <td width="25%" class="text-xs text-left">{{ $sede->school->name }}</td>
                                <td width="25%" class="text-left">{{ $sede->name }}</td>
                                <td width="15%" class="text-left">{{ $sede->department }}</td>
                                <td width="15%" class="text-left">{{ $sede->municipality }}</td>
                                <td class="flex gap-3 text-center" width="">
                                    <a href="{{ route('schools.sedes.show', [$sede->school->id, $sede->id]) }}"
                                        title="{{ __('view detail of sede') . ' ' . $sede->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-eye"></i></a>
                                    <a href="{{ route('schools.sedes.room_create', [$sede->id]) }}"
                                        title="{{ __('add classroom or premises to the school headquarters') . ' ' . $sede->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-people-roof"></i></a>
                                    <a href="{{ route('schools.sedes.manager_create', [$sede->id]) }}"
                                        title="{{ __('assign manager to the school headquarters') . ' ' . $sede->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-user-tie"></i></a>
                                    <a href="{{ route('schools.sedes.grados_create', [$sede->id]) }}"
                                        title="{{ __('add grados to be taught at headquarters') . ' ' . $sede->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-book"></i></a>
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
                    "responsive": true,
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
                        "targets": [4],
                        "orderable": false
                    }]
                });
            });
        </script>
    @endpush
</x-admin-layout>
