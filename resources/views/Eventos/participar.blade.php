<div class="container">
    <h1>Participar en el evento: {{ $evento->nombre }}</h1>
    <p>Detalles del evento: {{ $evento->descripcion }}</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('eventos.inscribirse', $evento->id) }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Participar</button>
    </form>
</div>