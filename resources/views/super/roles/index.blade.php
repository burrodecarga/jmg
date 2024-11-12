<x-admin-layout>
    <x-slot name="header">
        <h2 class="w-full text-xl font-semibold sm:w-full md:w-3/4">{{ __('role adminitration panel') }}</h2>
    </x-slot>

    <div class="mt-10">
        <div class="w-full mx-auto text-center card md:w-1/2 min-w-12">
            <div class="text-white card-header bg-primary">
                <div class="flex items-center justify-between card-title">
                    <h4 class="text-white">
                        {{ __('list of roles') }}
                    </h4>

                    <a href="{{ route('roles.create') }}" class="text-white cursor-pointer" title="{{ __('add role') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="role" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center">{{ __('id') }}</th>
                            <th style="text-align: center">{{ __('name') }}</th>
                            <th style="text-align: center">{{ __('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td width="10%">{{ $role->id }}</td>
                                <td width="60%">{{ $role->name }}</td>
                                <td width="30%" class="flex justify-around w-full mx-auto text-center">
                                    <a href="{{ route('roles.show', $role->id) }}" class="text-green-600">
                                        <i class="fa-solid icono fa-eye"></i>
                                    </a>
                                    <a href="{{ route('roles.edit', $role->id) }}">
                                        <i class="fa-solid icono fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        class="text-red-600 form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa-solid icono fa-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>





    @push('script')
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> --}}



        <script>
            $(document).ready(function() {
                $('#role').DataTable({
                    "columnDefs": [{
                        "targets": [2],
                        "orderable": false
                    }],
                    language: {
                        info: 'página _PAGE_ de _PAGES_',
                        infoEmpty: 'No hay regiastros diponibles',
                        infoFiltered: '(filtro de _MAX_ total)',
                        lengthMenu: '_MENU_ registros/pag.',
                        zeroRecords: 'No hay registros',
                        search: "Buscar ",
                        paginate: {
                            previous: 'prev',
                            next: 'sig'
                        }
                    }


                });


                setTimeout(function() {
                    $('#alert').remove()
                }, 300);


                $('.form-delete').submit(function(e) {

                    e.preventDefault();

                    Swal.fire({
                        title: 'Está seguro de querer eliminar Role?',
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
                });

            });
        </script>
    @endpush
</x-admin-layout>
