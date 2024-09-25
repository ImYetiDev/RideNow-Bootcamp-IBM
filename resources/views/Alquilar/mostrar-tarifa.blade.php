@section('title', 'Alquilar')
@include('header')

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
<br>


<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>



        <div class="container">
            <h2>Tarifa de alquiler para la bicicleta {{ $bicicleta->modelo }}</h2>
            <p>Tarifa por hora: ${{ $tarifa_por_hora }}</p>

            @if(auth()->user()->estrato == 1 || auth()->user()->estrato == 2)
            <p>Descuento aplicado: 10%</p>
            @elseif(auth()->user()->estrato == 3 || auth()->user()->estrato == 4)
            <p>Descuento aplicado: 5%</p>
            @else
            <p>No se aplica descuento</p>
            @endif

            <form action="{{ route('alquiler.crear') }}" method="POST">
                @csrf
                <input type="hidden" name="bicicleta_id" value="{{ $bicicleta->id }}">
                <button type="submit" class="btn btn-success">Iniciar Alquiler</button>
            </form>
        </div>




    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="z-index: 1050;"><i class="bi bi-arrow-up"></i></a>
    <footer class="footer fixed-bottom pr-2">
        @include('footer')
    </footer>
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