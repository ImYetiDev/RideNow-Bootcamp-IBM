@section('title', 'Alquilar Bicicleta')
@include('header')

<body>

    @include('sidebar')
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

        cambiarFondo('alquiler');
        cambiarIcono('alquilerIcon');
        cambiarTexto('alquilerText');
    </script>

    <div class="container d-flex justify-content-center align-items-center vh-100 bg-dark">
    <div class="w-50 p-4 bg-secondary rounded shadow">    
    <h1>Alquilar Bicicleta - {{ $bicicleta->marca }}</h1>

        <div class="w-25">
            <form action="{{ route('alquilar.guardar') }}" method="POST">
                @csrf

                <!-- Bicicleta ID oculto -->
                <input type="hidden" name="bicicleta_id" value="{{ $bicicleta->id }}">

                <!-- Estación de inicio -->
                <div class="form-group mb-3">
                    <label for="estacion_inicio_id">Estación de Inicio</label>
                    <select name="estacion_inicio_id" id="estacion_inicio_id" class="form-control" required>
                        @foreach($estaciones as $estacion)
                        <option value="{{ $estacion->id }}">{{ $estacion->nombre_estacion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Estación de fin -->
                <div class="form-group mb-3">
                    <label for="estacion_fin_id">Estación de Fin</label>
                    <select name="estacion_fin_id" id="estacion_fin_id" class="form-control">
                        <option value="">Seleccione la estación de fin (opcional)</option>
                        @foreach($estaciones as $estacion)
                        <option value="{{ $estacion->id }}">{{ $estacion->nombre_estacion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Fecha de inicio -->
                <div class="form-group mb-3">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                </div>

                <!-- Fecha de fin (opcional) -->
                <div class="form-group mb-3">
                    <label for="fecha_fin">Fecha de Fin (opcional)</label>
                    <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control">
                </div>

                <!-- Botón para confirmar el alquiler -->
                <button type="submit" class="btn btn-success">Confirmar Alquiler</button>
            </form>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100 bg-dark">
        <div class="w-50 p-4 bg-secondary rounded shadow">
        <h1 class="pt-0">Crear un Evento</h1>
            <form action="{{ route('eventos.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nombre" class="form-label text-white">Nombre del Evento</label>
                    <input type="text" name="nombre" id="nombre" class="form-control bg-light text-white" required>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcion" class="form-label text-white">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control bg-light text-white" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha" class="form-label text-white">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control bg-light text-white" required>
                </div>

                <div class="form-group mb-3">
                    <label for="ubicacion" class="form-label text-white">Ubicación</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control bg-light text-white" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Crear Evento</button>
            </form>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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