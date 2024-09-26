@section('title', 'Alquilar')
@include('header')

@include('sidebar')
@include('navbar')
@include('cards')

<script>
    function cambiarFondo(selected) {
        var selected = document.getElementById(selected);
        selected.classList.remove('bg-secondary');
        selected.classList.add('bg-success');
    }

    function cambiarIcono(icon) {
        var icon = document.getElementById(icon);
        icon.classList.remove('text-success');
        icon.classList.add('text-secondary');
    }

    function cambiarTexto(texto) {
        var texto = document.getElementById(texto);
        texto.classList.add('text-dark');
    }

    cambiarFondo('alquiler');
    cambiarIcono('alquilerIcon');
    cambiarTexto('alquilerText');
</script>

<br>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container">
            <!-- Mostrar mensaje si el usuario ya tiene una bicicleta alquilada -->
            @if ($alquilerActivo)
            <div class="alert alert-success d-flex-wrap" role="alert">
                <div class="col-md-1">
                    <i class="bi bi-bicycle fa-3x text-success"
                        id="alquilerIcon"></i>
                </div>

                <h4 class="text-dark">Tienes una bicicleta alquilada:</h4>
                <p><strong>Marca:</strong> {{ $alquilerActivo->bicicleta->marca }}</p>
                <p><strong>Color:</strong> {{ $alquilerActivo->bicicleta->color }}</p>
                <p><strong>Fecha de inicio:</strong> {{ $alquilerActivo->fecha_inicio }}</p>

                <!-- Botón para devolver la bicicleta -->
                <form action="{{ route('alquilar.devolver', $alquilerActivo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Devolver Bicicleta</button>
                </form>
            </div>
            @endif

            <!-- Mostrar las regionales disponibles -->
            <div class="row">
                @foreach($Regionales as $dato)
                <div class="col-md-4 mb-4">
                    <div class="card bg-secondary">
                        <div class="card-header">
                            <h3 class="text-success">{{ $dato->nombre }}</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('alquilar.show', $dato->id) }}" class="text-success">Ver bicicletas</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="z-index: 1050;">
        <i class="bi bi-arrow-up"></i>
    </a>
    <footer class="footer fixed-bottom pr-2">
        @include('footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>