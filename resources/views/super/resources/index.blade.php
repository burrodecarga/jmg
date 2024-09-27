<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <x-slot name="header">
        <h2 class="w-full text-xl font-semibold capitalize sm:w-full md:w-3/4">{{ __('resource adminitration panel') }}
        </h2>
    </x-slot>

    <div class="p-10 mx-10">
        <div class="w-full mx-auto text-center card">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4>
                        {{ __('list of resources') }}
                    </h4>

                    <a href="#" class="text-white cursor-pointer" title="{{ __('add resource') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="resource" class="">
                    <thead>
                        <tr>
                            <th>{{ __('num') }}</th>
                            <th>{{ __('category') }}</th>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('description') }}</th>
                            <th>{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resources as $resource)
                            <tr class="odd:bg-slate-100">
                                <td width="" class="text-left">{{ $resource->id }}</td>
                                <td width="" class="text-left">{{ $resource->category }}</td>
                                <td width="" class="text-left">{{ $resource->name }}</td>
                                <td width="" class="text-left">{{ $resource->description }}</td>
                                <td class="flex gap-4 text-center" width="">
                                    <a href="{{ route('resources.edit', $resource->id) }}"
                                        title="{{ __('edit resource') . ' ' . $resource->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('resources.destroy', $resource->id) }}" method="POST"
                                        class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                title="{{ __('delete resource') . ' : ' . $resource->name }}"
                                                class="text-red-500 icono fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a href="#"
                                        title="{{ __('add resource to resource') . ' ' . $resource->name }}"><i
                                            class="text-blue-500 icono fa-solid fa-users-gear"></i></a>
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
                $('#resource').DataTable({
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
                        "targets": [],
                        "orderable": false
                    }]
                });
            });

            $('.form-delete').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Está seguro de querer eliminar espacio de escuela?',
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
