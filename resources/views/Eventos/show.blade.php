@section('title', 'Detalles del Evento')
@include('header')

<body>
    @include('sidebar')
    @include('navbar')

    <div class="container-fluid p-4">
        <h1>{{ $evento->nombre }}</h1>
        <p>{{ $evento->descripcion }}</p>
        <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>
        <p><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>

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
                <button type="submit" class="btn btn-primary">Inscribirse al Evento</button>
            </form>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
