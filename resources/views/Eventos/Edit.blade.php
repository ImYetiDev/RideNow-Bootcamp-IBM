@section('title', 'Editar Evento')

@include('header')

<body>
    @include('sidebar')
    @include('navbar')

    <div class="container-fluid p-4">
        <h1>Editar Evento - {{ $evento->nombre }}</h1>

        <!-- Mostrar mensajes de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Formulario para editar el evento -->
        <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo para editar el nombre del evento -->
            <div class="form-group mb-3">
                <label for="nombre">Nombre del Evento</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $evento->nombre }}" required>
            </div>

            <!-- Campo para editar la descripción del evento -->
            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $evento->descripcion }}</textarea>
            </div>

            <!-- Campo para editar la fecha del evento -->
            <div class="form-group mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $evento->fecha }}" required>
            </div>

            <!-- Campo para editar la ubicación del evento -->
            <div class="form-group mb-3">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ $evento->ubicacion }}" required>
            </div>

            <!-- Botón para guardar los cambios -->
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
