<x-admin-layout>

    <x-slot name="header">
        <h2 class="w-full text-xl font-semibold capitalize sm:w-full md:w-3/4">{{ __('school adminitration panel') }}
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="w-3/4 mx-auto text-center card">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4 class="text-white">
                        {{ __('list of candidates') }}
                    </h4>
                    <h4 class="text-white">
                        {{ $school->name }}
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <table id="school" class="table text-sm table-hover" style="width:100%">
                    <thead>
                        <tr style="text-align: justify">
                            <th width="10%">{{ __('id') }}</th>
                            <th width="25%">{{ __('name') }}</th>
                            <th width="25%">{{ __('cédula') }}</th>
                            <th width="15%">{{ __('phone') }}</th>
                            <th width="10%">{{ __('role') }}</th>
                            <th width="15%" style="text-align: center">actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @foreach ($users as $user)
                            <tr>
                                <th width="10%">{{ $user->id }}</th>
                                <th width="25%">{{ $user->name }} </th>
                                <th width="25%">{{ $user->cedula }} </th>
                                {{-- <th width="30%">Address</th> --}}
                                <th width="15%">{{ $user->phone }} </th>
                                <th width="10%">{{ $user->rol }}</th>
                                <th width="15%" style="text-align: center">
                                    <form action="{{ route('schools.assign') }}" method="POST" class="form-asignar">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="school_id" value="{{ $school->id }}">
                                        @csrf
                                        @method('POST')
                                        <button type="submit"><i
                                                title="{{ __('assign admin') . ' : ' . $user->name }}"
                                                class="text-blue-500 icono fa-solid fa-user-tie"></i></button>
                                    </form>
                                </th>
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

                $('#user').DataTable({
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
                        "lengthMenu": "Mostrar  <select class='rounded custom-select custom-select-sm'>" +
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
                setTimeout(function() {
                    $('#alert').remove()
                }, 3000);



                $('.form-delete').submit(function(e) {
                    aler('XX')
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

                        }
                    })


                })

            });

            $(function() {
                $(document).tooltip();
            });
        </script>
    @endpush
</x-admin-layout>
