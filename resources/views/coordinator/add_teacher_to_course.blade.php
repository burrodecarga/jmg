<x-admin-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.dataTables.min.css') }}" />
    <x-slot name="header">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
            <div class="info">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('administration panel') }} :
                    <span class="ml-2 uppercase">
                        {{ auth()->user()->name }}
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800">
                    Rol:
                    <span
                        class="ml-2 uppercase"></span>{{ auth()->user()->roles->first()->name ?? 'No tiene rol asignado' }}
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800">
                    Coordinador:
                    <span class="text-xs uppercase">
                        {{ auth()->user()->coordina->first()->name ?? 'No es Coordinador de Sede' }}
                    </span>
                </h2>
            </div>
            <div class="info">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('school info') }} :
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->name ?? 'No es Coordinador de Sede' }}
                        </span>
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->address ?? 'No es Coordinador de Sede' }}
                        </span>
                    </span>
                </h2>
            </div>
            <div class="contact">
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    {{ __('school contact') }} :
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->email ?? 'no registrado' }}
                        </span>
                    </span>
                </h2>
                <h2 class="text-sm font-semibold leading-tight text-gray-800 uppercase">
                    <span class="uppercase">
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->phone ?? 'no registrado' }}
                        </span>-
                        <span class="text-xs uppercase">
                            {{ auth()->user()->coordina->first()->cell ?? 'no registrado' }}
                        </span>
                    </span>
                </h2>
            </div>
        </div>

    </x-slot>

    <div class="py-6">
        <div class="w-2/3 min-h-screen mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl h-62 sm:rounded-lg">
                <div class="p-6 bg-blue-100 lg:p-8">
                    <div class="w-full">
                        @livewire('add_teacher_to_course', compact('lectivo', 'teachers'))
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#grado').DataTable({
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
