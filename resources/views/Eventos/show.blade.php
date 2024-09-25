@section('title', 'Detalles del Evento')
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

<body>
    <div class="container-fluid p-4">
        <h1>Detalles del Evento</h1>

        <h2>{{ $evento->nombre }}</h2>
        <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
        <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>
        <p><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>
        <p><strong>ID del Organizador:</strong> {{ $evento->organizador_id }}</p>
        <p><strong>Creado el:</strong> {{ $evento->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Última Modificación:</strong> {{ $evento->updated_at->format('d/m/Y H:i') }}</p>

        <!-- Verificar si el usuario ya está participando en el evento -->
        @php
            $participando = \App\Models\Participacion::where('evento_id', $evento->id)
                            ->where('usuario_id', session('usuario_id'))
                            ->exists();
        @endphp

        <div class="mt-4">
            <!-- Mostrar el botón de Participar o Cancelar Participación -->
            <form action="{{ route('eventos.participar', $evento->id) }}" method="POST">
                @csrf
                @if ($participando)
                    <button type="submit" class="btn btn-danger">Cancelar Participación</button>
                @else
                    <button type="submit" class="btn btn-primary">Participar en el Evento</button>
                @endif
            </form>
        </div>

        <!-- Verificar si el usuario es administrador (tipo_usuario == 3) -->
        @if (session('tipo_usuario') == 3)
            <div class="mt-4">
                <!-- Botón para Editar el Evento -->
                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">Editar Evento</a>

                <!-- Formulario para Eliminar el Evento -->
                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar Evento</button>
                </form>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>