@section('title', 'Crear Evento')
@include('header')

<body>

    @include('sidebar')


    <!-- @section('tabla', 'Crear Evento') -->
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

        cambiarFondo('evento');
        cambiarIcono('eventoIcon');
        cambiarTexto('eventoText');
    </script>

    <h1>Crear un Evento</h1>

    <form action="{{ route('eventos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Evento</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Crear Evento</button>
    </form>






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