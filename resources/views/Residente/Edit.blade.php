@section('title', 'Editar Residente')
@include('header')

<body>

    @include('sidebar')


    @section('tabla', 'Editar Residente')
    @include('navbar')

    @include('cards')

    <script>
            function cambiarFondo(selected) {
                var selected = document.getElementById(selected);

                // Cambiar el fondo del elemento
                selected.classList.remove('bg-secondary');
                selected.classList.add('bg-success');
            }

            function cambiarIcono(icon) {
                var icon = document.getElementById(icon);

                // Cambiar el icono de color
                icon.classList.remove('text-success');
                icon.classList.add('text-secondary');
            }

            function cambiarTexto(texto) {
                // Obtener el texto y cambiar su color
                var texto = document.getElementById(texto);
                texto.classList.add('text-dark');
            }

            cambiarFondo('residente');
            cambiarIcono('residenteIcon');
            cambiarTexto('residenteText');
        </script>

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Formulario Editar Residente</h6>
                    <form action="{{ route('Residente.update', $Residente->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ old('nombre', $Residente->nombre) }}">
                        </div>

                        <div class="mb-3">
                            <label for="movil" class="form-label">Número de Teléfono Móvil</label>
                            <input type="text" class="form-control" id="movil" name="movil" required value="{{ old('movil', $Residente->movil) }}">
                        </div>

                        <div class="mb-3">
                            <label for="propietario" class="form-label">¿Es Propietario?</label>
                            <select class="form-select" id="propietario" name="propietario" required>
                                <option value="1" {{ old('propietario', $Residente->propietario) == 1 ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('propietario', $Residente->propietario) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nombre_propietario" class="form-label">Nombre del Propietario</label>
                            <input type="text" class="form-control" id="nombre_propietario" name="nombre_propietario" value="{{ old('nombre_propietario', $Residente->nombre_propietario) }}">
                        </div>

                        <div class="mb-3">
                            <label for="movil_propietario" class="form-label">Número de Teléfono del Propietario</label>
                            <input type="text" class="form-control" id="movil_propietario" name="movil_propietario" value="{{ old('movil_propietario', $Residente->movil_propietario) }}">
                        </div>

                        <div class="mb-3">
                            <label for="email_propietario" class="form-label">Correo Electrónico del Propietario</label>
                            <input type="email" class="form-control" id="email_propietario" name="email_propietario" value="{{ old('email_propietario', $Residente->email_propietario) }}">
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required value="{{ old('estado', $Residente->estado) }}">
                        </div>

                        <div class="mb-3">
                            <label for="vivienda_id" class="form-label"> Vivienda</label>
                            <select id="vivienda_id" name="vivienda_id" class="form-control">
                                <option disabled selected>------Seleccionar------</option>
                                @foreach($viviendas as $vivienda)
                                <option value="{{ $vivienda->id }}" @if($vivienda->id == $Residente->vivienda_id) selected @endif>{{ $vivienda->nomenclatura }}</option>
                                @endforeach
                            </select>

                            
                        </div>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </form>







                </div>
            </div>
        </div>
    </div>





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>