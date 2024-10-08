@section('title', 'Detalles del Evento')
@include('header')

<body>
    @include('sidebar')
    @include('navbar')

    <div class="container d-flex justify-content-center align-items-center vh-100 bg-dark">
        <div class="card w-50 p-4 bg-secondary text-white rounded shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-success">{{ $evento->nombre }}</h1>
                <p class="card-text">{{ $evento->descripcion }}</p>
                <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha }}</p>
                <p class="card-text"><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>

                <!-- Mostrar mensajes de éxito o error -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Verificar si el usuario está participando -->
                @if ($participacion)
                    <div class="alert alert-info">
                        Ya estás inscrito en este evento.
                    </div>
                    <form action="{{ route('eventos.cancelar', $evento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancelar Participación</button>
                    </form>
                @else
                    <form action="{{ route('eventos.participar', $evento->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Inscribirse al Evento</button>
                    </form>
                @endif

                <!-- Mostrar botones de editar y eliminar solo si el usuario es administrador -->
                @if (auth()->user() && auth()->user()->tipo_usuario == 3)
                    <hr class="bg-light">
                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">Editar Evento</a>

                    <!-- Botón para eliminar evento -->
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?')">Eliminar Evento</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
