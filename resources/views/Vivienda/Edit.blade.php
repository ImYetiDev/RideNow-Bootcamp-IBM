@section('title', 'Editar Vivienda')
@include('header')

<body>

    @include('sidebar')


    @section('tabla', 'Editar Vivienda')
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

            cambiarFondo('vivienda');
            cambiarIcono('viviendaIcon');
            cambiarTexto('viviendaText');
        </script>

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Editar Vivienda</h6>
                    <form action="{{ route('Vivienda.update', $Viviendas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nomenclatura" class="form-label">Nomenclatura</label>
                            <input type="text" class="form-control" id="nomenclatura" name="nomenclatura" required value="{{ old('nomenclatura', $Viviendas->nomenclatura) }}">
                        </div>

                        <div class="mb-3">
                            <label for="bloque_id" class="form-label"> Viviendas</label>
                            <select id="bloque_id" name="bloque_id" class="form-control">
                                <option disabled selected>------Seleccionar------</option>
                                @foreach($bloques as $bloque) <!-- Utiliza $bloques en lugar de $bloque -->
                                <option value="{{ $bloque->id }}" @if($bloque->id == $Viviendas->bloque_id) selected @endif>{{ $bloque->nombre }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required value="{{ old('estado', $Viviendas->estado) }}">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required value="{{ old('telefono', $Viviendas->telefono) }}">
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