@section('title', 'Alquilar Bicicleta')
@include('header')

<body>
    @include('sidebar')
    @include('navbar')

    <div class="container-fluid p-4">
        <h1>Bicicletas Disponibles</h1>

        <!-- Mostrar mensaje de error si el usuario ya tiene una bicicleta alquilada -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Mostrar un mensaje si el usuario tiene una bicicleta alquilada -->
        @if ($alquilerActivo)
            <div class="alert alert-warning">
                Ya tienes una bicicleta alquilada. No puedes alquilar otra hasta que devuelvas la actual.
            </div>
        @endif

        <!-- Listado de bicicletas disponibles -->
        <div class="row">
            @foreach($bicicletas as $bicicleta)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">{{ $bicicleta->marca }}</div>
                        <div class="card-body">
                            <p>Precio: {{ $bicicleta->precio }}</p>
                            <p>Color: {{ $bicicleta->color }}</p>
                            <p>Estado: {{ ucfirst($bicicleta->estado) }}</p>
                            
                            <!-- Mostrar botón de alquilar solo si el usuario no tiene bicicleta alquilada -->
                            @if (!$alquilerActivo)
                                <a href="{{ route('alquilar.bicicleta', $bicicleta->id) }}" class="btn btn-primary">Alquilar</a>
                            @else
                                <button class="btn btn-secondary" disabled>No Disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
