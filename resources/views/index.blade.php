@section('title', 'RideNow - Inicio')
@include('header')

<body>
    @include('sidebar')
    @include('navbar')
    @include('cards')

    <div class="container-fluid p-4">
        <h1>Tu Actividad Actual</h1>

        <div class="row">
            <!-- Mostrar tarjeta de la bicicleta alquilada si existe -->
            @if (!empty($alquilerActivo))
                <div class="col-md-6">
                    <div class="card bg-secondary mb-4">
                        <div class="card-header text-success">
                            <h3>Bicicleta Alquilada</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Marca:</strong> {{ $alquilerActivo->bicicleta->marca }}</p>
                            <p><strong>Color:</strong> {{ $alquilerActivo->bicicleta->color }}</p>
                            <p><strong>Precio por hora:</strong> ${{ number_format($alquilerActivo->bicicleta->precio, 2) }}</p>
                            <p><strong>Fecha de inicio:</strong> {{ $alquilerActivo->fecha_inicio }}</p>
                            <p><strong>Estación de Inicio:</strong> {{ $alquilerActivo->estacion_inicio->nombre_estacion }}</p>

                            <!-- Botón para devolver la bicicleta -->
                            <form action="{{ route('alquilar.devolver', $alquilerActivo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Devolver Bicicleta</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Mostrar tarjeta del evento inscrito si existe -->
            @if (!empty($eventoParticipado))
                <div class="col-md-6">
                    <div class="card bg-secondary mb-4">
                        <div class="card-header text-primary">
                            <h3>Evento Inscrito</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombre del Evento:</strong> {{ $eventoParticipado->evento->nombre }}</p>
                            <p><strong>Descripción:</strong> {{ $eventoParticipado->evento->descripcion }}</p>
                            <p><strong>Fecha:</strong> {{ $eventoParticipado->evento->fecha }}</p>
                            <p><strong>Ubicación:</strong> {{ $eventoParticipado->evento->ubicacion }}</p>

                            <!-- Botón para cancelar la participación en el evento -->
                            <form action="{{ route('eventos.cancelar', $eventoParticipado->evento->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Cancelar Participación</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
