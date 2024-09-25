@section('title', 'Alquilar')
@include('header')

@include('sidebar')

@include('navbar')


@include('cards')

<div class="container">
    <h1>Bicicletas disponibles en {{ $region->nombre }}</h1>

    @if($bicicletas->isEmpty())
    <p>No hay bicicletas disponibles en esta región.</p>
    @else
    <div class="row g-4">
        @foreach($bicicletas as $bicicleta)
        @php
        // Definir colores según el estado de la bicicleta
        $colorClass = '';
        if ($bicicleta->estado == 'Libre') {
        $colorClass = 'text-success'; // Verde para Libre
        } elseif ($bicicleta->estado == 'mantenimiento') {
        $colorClass = 'text-warning'; // Amarillo para mantenimiento
        } elseif ($bicicleta->estado == 'Alquilada') {
        $colorClass = 'text-primary'; // Azul para Alquilada
        }
        @endphp

        <div class="col-md-4">
            <div class="card bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="bi bi-bicycle fa-3x {{ $colorClass }}"></i>
                <div class="ms-3">
                    <h5 class="card-header">{{ $bicicleta->marca }}</h5>
                    <div class="card-body">
                        <p class="mb-2">Precio: <span class="fw-bold">{{ $bicicleta->precio }}</span></p>
                        <p class="mb-2">Color: <span class="fw-bold">{{ $bicicleta->color }}</span></p>
                        <p class="mb-2">Estado: <span class="{{ $colorClass }}">{{ ucfirst($bicicleta->estado) }}</span></p>
                        @if ($bicicleta->estado == 'Libre')
                        <a href="{{ route('alquilar.formulario', $bicicleta->id) }}" class="btn btn-primary">Alquilar</a>
                        @else
                        <button class="btn btn-secondary" disabled>No Disponible</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-success bg-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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