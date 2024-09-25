@section('title', 'Alquilar')
@include('header')

@include('sidebar')

@include('navbar')


@include('cards')
<script>
    function cambiarFondo(selected) {
        var selected = document.getElementById(selected);

        // Cambiar el fondo del elemento
        selected.classList.remove('bg-secondary');
        selected.classList.add('bg-success');
    }

    function cambiarIcono(icon) {
        var icon = document.getElementById(icon);

        // Cambiar el icono de color
        icon.classList.remove('text-success');
        icon.classList.add('text-secondary');
    }

    function cambiarTexto(texto) {
        // Obtener el texto y cambiar su color
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
        <p><strong>Creado el:</strong> {{ $evento->created_at }}</p>
        <p><strong>Última Modificación:</strong> {{ $evento->updated_at }}</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>