<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        <h2 class="w-full text-xl font-semibold capitalize sm:w-full md:w-3/4">{{ __('school adminitration panel') }}
        </h2>
    </x-slot>

    <div class="mt-10">
        <div class="w-10/12 mx-auto text-center card">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4>
                        {{ __('list of schools') }}
                    </h4>

                    <a href="{{ route('schools.create') }}" class="text-white cursor-pointer"
                        title="{{ __('add school') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="school" class="table text-sm table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('nit') }}</th>
                            <th>{{ __('dane') }}</th>
                            <th class="text-center"> {{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schools as $school)
                            <tr class="odd:bg-slate-100">
                                <td width="40%" class="text-left">{{ $school->name }}</td>
                                <td width="20%" class="text-left">{{ $school->nit }}</td>
                                <td width="20%" class="text-left">{{ $school->dane }}</td>
                                <td class="flex gap-4 text-center" width="20%">
                                    <a href="{{ route('schools.show', $school->id) }}"
                                        title="{{ __('view detail of school') . ' ' . $school->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-eye"></i></a>
                                    <a href="{{ route('schools.edit', $school->id) }}"
                                        title="{{ __('edit school') . ' ' . $school->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-newspaper"></i></a>
                                    <form action="{{ route('schools.destroy', $school->id) }}" method="POST"
                                        class="form-delete">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        @method('DELETE')
                                        <button type="submit"><i
                                                title="{{ __('delete school') . ' : ' . $school->name }}"
                                                class="text-red-500 icono fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a href="{{ route('schools.sedes.create', $school->id) }}"
                                        title="{{ __('add sede to school') . ' ' . $school->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-code-fork"></i></a>
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
                $('#school').DataTable({
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
                        "targets": [3],
                        "orderable": false
                    }]
                });
            });

            $('.form-delete').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Está seguro de querer eliminar escuela?',
                    text: "Esta operación es irreversible",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();
                        // Swal.fire(
                        //   'Deleted!',
                        //   'Your file has been deleted.',
                        //   'success'
                        // )
                    }
                })


            })
        </script>
    @endpush
</x-admin-layout>
