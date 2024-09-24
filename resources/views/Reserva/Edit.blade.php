@section('title', 'Editar Reserva')
@include('header')

<body>

    @include('sidebar')


    @section('tabla', 'Editar Reserva')
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

            cambiarFondo('reserva');
            cambiarIcono('reservaIcon');
            cambiarTexto('reservaText');
        </script>

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Formulario Editar Reserva</h6>
                    <form action="{{ route('Reserva.update', $reserva->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
    <label for="zona_comun_id" class="form-label">Zona Comun</label>
    <select id="zona_comun_id" name="zona_comun_id" class="form-control">
        <option disabled selected>------Seleccionar------</option>
        @foreach($zonas_comunes as $zona_comun)
            <option value="{{ $zona_comun->id }}" @if(old('zona_comun_id', $reserva->zona_comun_id) == $zona_comun->id) selected @endif>{{ $zona_comun->nombre }}</option>
        @endforeach
    </select>
</div>

                        <div class="mb-3">
                            <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                            <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required value="{{ old('fecha_reserva', $reserva->fecha_reserva) }}">
                        </div>

                        <div class="mb-3">
                            <label for="hora_reserva" class="form-label">Hora de Reserva</label>
                            <input type="time" class="form-control" id="hora_reserva" name="hora_reserva" required value="{{ old('hora_reserva', $reserva->hora_reserva) }}">
                        </div>

                        <div class="mb-3">
    <label for="residente_id" class="form-label">Residente</label>
    <select id="residente_id" name="residente_id" class="form-control">
        <option disabled selected>------Seleccionar------</option>
        @foreach($residentes as $residente)
            <option value="{{ $residente->id }}" @if(old('residente_id', $reserva->residente_id) == $residente->id) selected @endif>{{ $residente->nombre }}</option>
        @endforeach
    </select>
</div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required value="{{ old('estado', $reserva->estado) }}">
                        </div>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </form>





                </div>
            </div>
        </div>
    </div>





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>