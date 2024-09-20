<x-admin-layout>
    <div class="max-w-md mx-auto bg-white rounded shadow-lg">
        <div class="w-full p-6 mx-auto my-10">
            <h1 class="text-xl italic font-semibold capitalize">
                {{ __($title) }}
            </h1>
            <hr>
            <form action="{{ route('grados.store') }}" method="POST" enctype="multipart/form-data">
                @include('super.grados.partials.form')
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {

                var extensionesValidas = ".png, .gif, .jpeg, .jpg";
                var pesoPermitido = 2048;

                // Cuando cambie #fichero
                $("#fichero").change(function() {
                    $('#texto').text('');
                    $('#img').attr('src', '');

                    if (validarExtension(this)) {

                        if (validarPeso(this)) {
                            verImagen(this);
                        }
                    }
                });

                // Validacion de extensiones permitidas

                function validarExtension(datos) {

                    var ruta = datos.value;
                    var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
                    var extensionValida = extensionesValidas.indexOf(extension);

                    if (extensionValida < 0) {
                        $('#texto').text('La extensión no es válida Su fichero tiene de extensión: .' + extension);
                        return false;
                    } else {
                        return true;
                    }
                }

                // Validacion de peso del fichero en kbs

                function validarPeso(datos) {

                    if (datos.files && datos.files[0]) {

                        var pesoFichero = datos.files[0].size / 1024;

                        if (pesoFichero > pesoPermitido) {
                            $('#texto').text('El peso maximo permitido del fichero es: ' + pesoPermitido +
                                ' KBs Su fichero tiene: ' + pesoFichero + ' KBs');
                            return false;
                        } else {
                            return true;
                        }
                    }
                }

                // Vista preliminar de la imagen.
                function verImagen(datos) {

                    if (datos.files && datos.files[0]) {

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#img').attr('src', e.target.result);
                        };

                        reader.readAsDataURL(datos.files[0]);
                    }
                }
            });
        </script>
    @endpush

</x-admin-layout>
