@section('title', 'Alquilar Bicicleta')
@include('header')

<body>
    @include('sidebar')
    @include('navbar')

    <div class="container-fluid p-4">
        <h1>Bicicletas Disponibles en {{ $region->nombre }}</h1>

        <!-- Mostrar mensaje de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Listado de bicicletas disponibles para alquilar -->
        <div class="row">
            @foreach($bicicletas as $bicicleta)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">{{ $bicicleta->marca }}</div>
                        <div class="card-body">
                            <p>Precio: {{ $bicicleta->precio }}</p>
                            <p>Color: {{ $bicicleta->color }}</p>
                            <p>Estado: {{ ucfirst($bicicleta->estado) }}</p>
                            
                            <!-- Mostrar botón de alquilar solo si la bicicleta está libre y el usuario no tiene bicicleta alquilada -->
                            @if (!$alquilerActivo && $bicicleta->estado === 'Libre')
                                <a href="{{ route('alquilar.formulario', $bicicleta->id) }}" class="btn btn-primary">Alquilar</a>
                            @else
                                <button class="btn btn-secondary" disabled>
                                    {{ $bicicleta->estado === 'Alquilada' ? 'Alquilada' : ($bicicleta->estado === 'Mantenimiento' ? 'En Mantenimiento' : 'No Disponible') }}
                                </button>
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
