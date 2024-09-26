@section('title', 'Eventos')
@include('header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('sidebar')

        @include('navbar')

        <div class="container-fluid position-relative d-block p-4">
            <h1 class="text-white">Eventos Disponibles</h1>

            <!-- Botón para crear un nuevo evento, solo visible para administradores -->
            @if (auth()->user() && auth()->user()->tipo_usuario == 3)
                <a href="{{ route('Evento.create') }}" class="btn btn-success mb-3">Crear Nuevo Evento</a>
            @endif

            @forelse($eventos as $evento)
                <div class="card mb-3 bg-secondary text-white shadow-lg ">
                    <div class="card-body">
                        <h3 class="card-title text-success">{{ $evento->nombre }}</h3>
                        <p class="card-text">{{ $evento->descripcion }}</p>
                        <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha }}</p>
                        <p class="card-text"><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>
                        <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-success">Ver Detalles</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    No hay eventos disponibles en este momento.
                </div>
            @endforelse
        </div>

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

        <footer class="footer fixed-bottom">
            @include('footer')
        </footer>
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    
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
