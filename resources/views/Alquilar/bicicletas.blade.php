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

        <!-- Mostrar la bicicleta alquilada si el usuario tiene una -->
        @if ($alquilerActivo)
            <div class="alert alert-info">
                <h4>Tienes una bicicleta alquilada:</h4>
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
                            
                            <!-- Mostrar botón de alquilar solo si el usuario no tiene bicicleta alquilada -->
                            @if (!$alquilerActivo)
                                <a href="{{ route('alquilar.formulario', $bicicleta->id) }}" class="btn btn-primary">Alquilar</a>
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
